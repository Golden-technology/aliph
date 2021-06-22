<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Customer;
use App\Models\ItemStore;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Invoice;
use App\Models\Vendor;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $customers = Customer::count();
        $vendors = Vendor::count();
        $invoices = Invoice::sum('total');
        $bills = Bill::sum('total');
        return view('dashboard.index' , compact('customers' , 'vendors', 'invoices' , 'bills'));
    }

    public function storeItems($store)
    {
        $ids = collect();
        $items = ItemStore::where('store_id', $store)->get()->filter(function ($item) use($ids) {
            if($ids->search($item->item->id)) {
                return false;
            }else {
                $ids->push($item->item->id);
                return true;
            }
        });
        return response()->json($items);
    }

    public function units($item)
    {
        $item = Item::find($item);
        return response()->json($item->units->load('unit'));
    }
}
