<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = Vendor::paginate();
        return view('dashboard.vendors.index', compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.vendors.create');
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
            'name'     => ['required' , 'string'],
        ]);

        $vendor = vendor::create($request->all());

        return redirect()->route('vendors.show', $vendor->id)->with('success', translate('تمت العملية بنجاح'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        $headers = json_decode(
            json_encode([
                ['name' => translate('التفاصيل') , 'active' => true] ,
                ['name' => translate('الفواتير') , 'active' => true]
            ]) );
        $contents = [
            'content'   => ['active' => true, 'name' =>  translate('التفاصيل')], 
            'bills'     => ['active' => false, 'name' => translate('الفواتير')]
        ];
        
        return view('dashboard.vendors.show', compact('vendor', 'headers', 'contents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        return view('dashboard.vendors.edit', compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor $vendor)
    {
        $request->validate([
            'name'     => ['required' , 'string'],
        ]);

        $vendor->update($request->all());

        return redirect()->route('vendors.show', $vendor->id)->with('success', translate('تمت العملية بنجاح'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        //
    }
}
