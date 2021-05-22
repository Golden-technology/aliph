<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use App\Models\Item;
use App\Models\Unit;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\InitialInvoice;
use Illuminate\Support\Facades\DB;
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
        $items = Item::all();
        $units = Unit::all();
        return view('dashboard.initials.create', compact('customers', 'taxes', 'items', 'units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInitialInvoice $request)
    {
        // dd($request->all());
        return DB::transaction(function () use($request) {
            $initial = InitialInvoice::create($request->validated());
    
            if($request->items) {
                for ($i=0; $i < count($request->items); $i++) { 
                    $initial->items()->create([
                        // 'item_store_id'     => $request->item_store[$i],
                        'item_id'           => $request->items[$i],
                        'unit_id'           => $request->units[$i],
                        'quantity'          => $request->quantity[$i],
                        'total'             => $request->quantity[$i] * $request->price[$i],
                        'price'             => $request->price[$i],
                        'tax'               => $request->tax[$i],
                        'discount'          => $request->discount[$i] ?? 0,
                    ]);
                }
            }

            $initial->update([
                'total' => $initial->items->sum('total')
            ]);
    
            return back()->with('success', translate('تمت العملية بنجاح'));
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
