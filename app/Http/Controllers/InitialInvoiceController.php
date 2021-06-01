<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use App\Models\Item;
use App\Models\Unit;
use App\Models\Store;
use App\Models\Customer;
use App\Models\ItemUnit;
use App\Models\ItemStore;
use Illuminate\Http\Request;
use App\Models\InitialInvoice;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInitialInvoice;

class InitialInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $initials = InitialInvoice::paginate();
        return view('dashboard.initials.index', compact('initials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        $taxes = Tax::all();
        $stores = Store::all();
        return view('dashboard.initials.create', compact('customers', 'taxes', 'stores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        return DB::transaction(function () use($request) {
            $initial = InitialInvoice::create($request->all());

            if($request->items) {
                for ($i=0; $i < count($request->items); $i++) { 

                    $item_unit = ItemUnit::where('item_id', $request->items[$i])->where('unit_id', $request->units[$i])->first();
                    $item_store = ItemStore::where('item_unit_id', $item_unit->id ?? null)->where('store_id', $request->store_id)->first();
                    
                    if($item_store) {
                        if($item_store->quantity >= $request->quantity[$i]) {
                            $initial->items()->create([
                                // 'bill_id'       => $bill->id,
                                'item_store_id' => $item_store->id,
                                'quantity'      => $request->quantity[$i],
                                'price'         => $request->price[$i],
                                'total'         => $request->price[$i] * $request->quantity[$i],
                                'tax'           => $request->taxes[$i],
                                'discount'      => $request->discounts[$i] ?? 0 ,
                            ]);
                        }

                        
                    }else {
                        continue;
                    }
                }
            }

            $initial->update([
                'total' => $initial->items->sum('total')
            ]);
    
            return redirect()->route('inti$initials.show' , $initial->id)->with('success', translate('تمت العملية بنجاح'));
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InitialInvoice  $initialInvoice
     * @return \Illuminate\Http\Response
     */
    public function show(InitialInvoice $initial)
    {
        return view('dashboard.initials.show', compact('initial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InitialInvoice  $initialInvoice
     * @return \Illuminate\Http\Response
     */
    public function edit(InitialInvoice $initialInvoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InitialInvoice  $initialInvoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InitialInvoice $initialInvoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InitialInvoice  $initialInvoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(InitialInvoice $initialInvoice)
    {
        //
    }
}
