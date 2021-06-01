<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;

    protected $fillable = ['invoice_id' , 'item_store_id', 'quantity', 'price', 'total', 'tax', 'discount'];


    public function itemStore()
    {
        return $this->belongsTo(ItemStore::class , 'item_store_id');
    }
}
