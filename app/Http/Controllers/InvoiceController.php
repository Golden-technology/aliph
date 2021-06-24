<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use App\Models\Item;
use App\Models\Unit;
use App\Models\Store;
use App\Models\Invoice;
use App\Models\Customer;
use App\Models\ItemUnit;
use App\Models\ItemStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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
            $invoice = Invoice::create($request->all());

            if($request->items) {
                for ($i=0; $i < count($request->items); $i++) { 

                    $item_store = ItemStore::where('item_id', $request->items[$i] ?? null)->where('store_id', $request->store_id)->first();
                    
                    if($item_store) {
                        if($item_store->quantity >= $request->quantity[$i]) {
                            $item_store->update([
                                'quantity' => $item_store->quantity - $request->quantity[$i] 
                            ]);

                            $invoice->items()->create([
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

            $invoice->update([
                'total' => $invoice->items->sum('total')
            ]);
    
            return redirect()->route('invoices.show' , $invoice->id)->with('success', translate('تمت العملية بنجاح'));
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
        $items = ItemStore::where('store_id' , $invoice->store_id)->get();
        $customers = Customer::all();
        $taxes = Tax::all();
        $stores = Store::all();
        return view('dashboard.invoices.edit', compact('invoice', 'items' , 'customers' , 'taxes', 'stores'));
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
        return DB::transaction(function () use($request , $invoice) {
            $invoice->update($request->all());

            if($request->items) {
                for ($i=0; $i < count($request->items); $i++) { 

                    $item_store = ItemStore::where('item_id', $request->items[$i] ?? null)->where('store_id', $request->store_id)->first();
                    
                    if($item_store) {
                        if(isset($invoice->items[$i])) {
                            if($invoice->items[$i]['quantity'] > $request->quantity[$i]) {
                                $item_store->update([
                                    'quantity' => $item_store->quantity + ($invoice->items[$i]['quantity'] - $request->quantity[$i]) 
                                ]);
                            }elseif($invoice->items[$i]['quantity'] < $request->quantity[$i]) {
                                $item_store->update([
                                    'quantity' => $item_store->quantity - ( $request->quantity[$i] - $invoice->items[$i]['quantity'] )
                                ]);
                            }
    
                            $invoice->items[$i]->update([
                                'item_store_id' => $item_store->id,
                                'quantity'      => $request->quantity[$i],
                                'price'         => $request->price[$i],
                                'total'         => $request->price[$i] * $request->quantity[$i],
                                'tax'           => $request->taxes[$i],
                                'discount'      => $request->discounts[$i] ?? 0 ,
                            ]);
                        }else {
                            $item_store->update([
                                'quantity' => $item_store->quantity - $request->quantity[$i] 
                            ]);

                            $invoice->items()->create([
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

            $invoice->update([
                'total' => $invoice->items->sum('total')
            ]);
    
            return redirect()->route('invoices.show' , $invoice->id)->with('success', translate('تمت العملية بنجاح'));
        });
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
