<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use App\Models\Item;
use App\Models\Unit;
use App\Models\Invoice;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ItemStore;
use App\Models\Store;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::paginate();
        return view('dashboard.invoices.index', compact('invoices'));
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
        return view('dashboard.invoices.create', compact('customers', 'taxes' , 'stores'));
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
            $initial = Invoice::create($request->validated());
    
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
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        return view('dashboard.invoices.show', compact('invoice'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
