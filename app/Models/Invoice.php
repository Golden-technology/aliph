<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id' , 'store_id', 'status', 'type' , 'total' , 'customer_condition' , 'condition' , 'tax' , 'discount'];

    public function customer()
    {
        return $this->belongsTo(Customer::class , 'customer_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class , 'store_id');
    }

    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }
    

}
