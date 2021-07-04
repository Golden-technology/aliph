<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Vendor;
use App\Models\Invoice;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $customers = Customer::count();
        $vendors = Vendor::count();
        $invoices = Invoice::sum('total');
        $bills = Bill::sum('total');
        return view('dashboard.index' , compact('customers' , 'vendors', 'invoices' , 'bills'));
    }
}
