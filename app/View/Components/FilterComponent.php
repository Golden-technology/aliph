<?php

namespace App\View\Components;

use App\Models\Customer;
use App\Models\Vendor;
use Illuminate\View\Component;


class FilterComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    public $customers;
    public $vendors;
    public $date;
    public function __construct($id = null , $customers = null , $date = null , $vendors = null)
    {
        $this->id = $id;
        $this->date = $date;
        $customers == true ? $this->customers =  Customer::get() : null;
        $vendors == true ? $this->vendors =  Vendor::get() : null;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.filter-component');
    }
}
