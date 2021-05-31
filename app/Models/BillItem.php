<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillItem extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bill_id',
        'item_store_id',
        'quantity',
        'price',
        'total',
        'tax',
        'discount',
    ];

    public function itemStore()
    {
        return $this->belongsTo(ItemStore::class, 'item_store_id');
    }
}
