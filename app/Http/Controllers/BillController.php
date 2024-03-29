<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tax;
use App\Models\Bill;
use App\Models\Item;
use App\Models\Unit;
use App\Models\Store;
use App\Models\Vendor;
use App\Models\BillItem;
use App\Models\Customer;
use App\Models\ItemUnit;
use App\Models\ItemStore;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBill;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $from = $request->from ? Carbon::parse($request->from)->startOfDay() : now()->subDays(2)->startOfDay();
        $to = $request->to ?  Carbon::parse($request->to)->endOfDay() : now()->endOfDay();

        $bills = Bill::when($request->number , function ($q) use($request) { return $q->where('id' , $request->number); })
        ->when($request->vendor && $request->vendor != "all" , function ($q) use($request) { return $q->where('vendor_id' , $request->vendor); } )
        ->when($request->from || $request->to , function ($q) use($from , $to) { return $q->whereBetween('created_at' , [$from , $to]); } )
        ->paginate();
        return view('dashboard.bills.index', compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendors = Vendor::all();
        $stores = Store::all();
        $taxes = Tax::all();
        $items = Item::all();
        $units = Unit::all();
        return view('dashboard.bills.create', compact('vendors', 'taxes', 'items', 'units', 'stores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'items' => ['required' ,  'array']
        ]);
        // dd($request->all());
        return DB::transaction(function () use($request) {
            $bill = Bill::create($request->all());

            if($request->items) {
                for ($i=0; $i < count($request->items); $i++) { 
                    if ($request->quantity[$i]) {
                        $item_store = ItemStore::where('item_id', $request->items[$i] ?? null)->where('store_id', $request->store_id)->first();
                        
                        if($item_store) {
                            $item_store->update([
                                'quantity' => $item_store->quantity + $request->quantity[$i] 
                            ]);
                        }else {
                            $item_store = ItemStore::create([
                                'item_id' => $request->items[$i],
                                'store_id' => $request->store_id,
                                'quantity' =>  $request->quantity[$i],
                                'price_sale' =>  $request->price[$i],
                            ]);
                        }
    
                        $bill->items()->create([
                            'item_id'       =>  $request->items[$i],
                            'quantity'      => $request->quantity[$i],
                            'price'         => $request->price[$i],
                            'total'         => $request->price[$i] * $request->quantity[$i],
                            'tax'           => $request->taxes[$i],
                            'discount'      => $request->discounts[$i] ?? 0 ,
                        ]);
                    }
                }
            }

            $bill->update([
                'total' => $bill->items->sum('total')
            ]);
    
            return redirect()->route('bills.show', $bill->id)->with('success', translate('تمت العملية بنجاح'));
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bill  $Bill
     * @return \Illuminate\Http\Response
     */
    public function show(Bill $bill)
    {
        return view('dashboard.bills.show', compact('bill'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bill  $Bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {
        $vendors = Vendor::all();
        $stores = Store::all();
        $taxes = Tax::all();
        $items = Item::all();
        $units = Unit::all();
        return view('dashboard.bills.edit', compact('bill', 'vendors', 'stores', 'taxes', 'items', 'units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bill  $Bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bill $bill)
    {
        $request->validate([
            'items' => ['required' ,  'array'],
            'store_id' => ['required'],
        ]);

        return DB::transaction(function () use($request , $bill) {
            $bill->update($request->all());

            

            if($request->items) {
                
                for ($i=0; $i < count($request->items); $i++) { 
                    if ($request->quantity[$i] > 0) {
                        $item_store = ItemStore::where('item_id', $request->items[$i] ?? null)->where('store_id', $request->store_id)->first();
                        if($item_store) {
                            if($bill->items[$i]['quantity'] > $request->quantity[$i]) {
                                $item_store->update([
                                    'quantity' => $item_store->quantity - ($bill->items[$i]['quantity'] - $request->quantity[$i]) 
                                ]);
                            }else {
                                $item_store->update([
                                    'quantity' => $item_store->quantity + ($request->quantity[$i] - $bill->items[$i]['quantity']) 
                                ]);
                            }
                        }else {
                            $item_store = ItemStore::create([
                                'item_id' => $request->items[$i],
                                'store_id' => $request->store_id,
                                'quantity' =>  $request->quantity[$i],
                                'price_sale' =>  $request->price[$i],
                            ]);
                        }
    
                        if(isset($bill->items[$i])) {
                            $bill->items[$i]->update([
                                // 'bill_id'       => $bill->id,
                                'item_id'       =>  $request->items[$i],
                                'quantity'      => $request->quantity[$i],
                                'price'         => $request->price[$i],
                                'total'         => $request->price[$i] * $request->quantity[$i],
                                'tax'           => $request->taxes[$i],
                                'discount'      => $request->discounts[$i] ?? 0 ,
                            ]);
                        }else {
                            $bill->items()->create([
                                // 'bill_id'       => $bill->id,
                                'item_id'       =>  $request->items[$i],
                                'quantity'      => $request->quantity[$i],
                                'price'         => $request->price[$i],
                                'total'         => $request->price[$i] * $request->quantity[$i],
                                'tax'           => $request->taxes[$i],
                                'discount'      => $request->discounts[$i] ?? 0 ,
                            ]);
                        }
                    }
                }
                    }
                    

            $bill->update([
                'total' => $bill->items->sum('total')
            ]);
    
            return redirect()->route('bills.show', $bill->id)->with('success', translate('تمت العملية بنجاح'));
        });
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bill  $Bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bill $bill)
    {
        //
    }
}
