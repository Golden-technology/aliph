<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

use function PHPUnit\Framework\arrayHasKey;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::paginate();
        return view('dashboard.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.customers.create');
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

        $customer = Customer::create($request->all());

        return redirect()->route('customers.show', $customer->id)->with('success', translate('تمت العملية بنجاح'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $headers = json_decode(
            json_encode([
                ['name' => translate('التفاصيل') , 'active' => true],
                ['name' => translate('العروض') , 'active' => false],
                ['name' => translate('الفواتير') , 'active' => false],
                // ['name' => translate('الدفعات') , 'active' => false],
                // ['name' => translate('المصروفات') , 'active' => false],
            ]));
        $contents = [
            'content'       => ['active' => true, 'name' => translate('التفاصيل')],
            'initial'       => ['active' => false, 'name' => translate('العروض')],
            'invoices'      => ['active' => false, 'name' => translate('الفواتير')],
            // 'expences'      => ['active' => false, 'name' => translate('الصروفات')],
        ];
        
        return view('dashboard.customers.show', compact('customer', 'headers', 'contents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('dashboard.customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        
        $request->validate([
            'name'     => ['required' , 'string'],
        ]);

        $customer->update($request->all());

        return redirect()->route('customers.show', $customer->id)->with('success', translate('تمت العملية بنجاح'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
