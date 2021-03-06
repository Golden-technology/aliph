<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InitialInvoiceItem extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'initial_invoice_id',
        'item_store_id',
        'quantity',
        'price',
        'tax',
        'discount',
        'total'
    ];

    public function itemStore()
    {
        return $this->belongsTo(ItemStore::class , 'item_store_id');
    }
}
