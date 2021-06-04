<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Vendor;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->type == 'vendor') {
            $payments = Payment::where('customer_id' , null)->paginate();
        }else {
            $payments = Payment::where('vendor_id' , null)->paginate();
        }
        return view('dashboard.payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendors = null; $customers = null;
        if(request()->type == 'vendor') {
            $vendors = Vendor::all();
        }else {
            $customers = Customer::all();
        }
        $methods = PaymentMethod::all();
        return view('dashboard.payments.create', compact('customers' , 'vendors', 'methods'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payment = Payment::create($request->all());
        return redirect()->route('payments.show' , $payment->id . '?type=' . request()->type)->with('success', translate('تمت العملية بنجاح'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        return view('dashboard.payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        $vendors = null; $customers = null;
        if(request()->type == 'vendor') {
            $vendors = Vendor::all();
        }else {
            $customers = Customer::all();
        }
        $methods = PaymentMethod::all();
        return view('dashboard.payments.edit', compact('payment', 'customers' , 'vendors', 'methods'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        $payment->update($request->all());
        return redirect()->route('payments.show' , $payment->id)->with('success', translate('تمت العملية بنجاح'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
