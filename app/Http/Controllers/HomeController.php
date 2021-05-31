<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemStore;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        return view('home');
    }

    public function storeItems($store)
    {
        $ids = collect();
        $items = ItemStore::where('store_id', $store)->get()->filter(function ($item) use($ids) {
            if($ids->search($item->itemUnit->item->id)) {
                return false;
            }else {
                $ids->push($item->itemUnit->item->id);
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
