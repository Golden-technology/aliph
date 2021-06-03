<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taxes = Tax::paginate();
        return view('dashboard.taxes.index', compact('taxes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'value'     => ['required', 'unique:taxes'],
        ]);

        $tax = Tax::create($request->all());

        return back()->with('success', translate('تمت العملية بنجاح'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function show(tax $tax)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function edit(tax $tax)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tax $tax)
    {
        $request->validate([
            'value'     => ['required', 'unique:taxes,value,' . $tax->id],
        ]);

        $tax->update($request->all());

        return back()->with('success', translate('تمت العملية بنجاح'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function destroy(tax $tax)
    {
        //
    }
}
