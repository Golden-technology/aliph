<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id', 
        'vendor_id', 
        'payment_method', 
        'number', 
        'reference', 
        'amount', 
        'received_amount',
        'bank',
        'details',
        'comments',
        'date'
    ];


    public function customer()
    {
        return $this->belongsTo(Customer::class , 'customer_id');
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class , 'vendor_id');
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class , 'payment_method');
    }
}
