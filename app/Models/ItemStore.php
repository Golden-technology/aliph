<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemStore extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'item_unit_id',
        'store_id',
        'quantity',
        'price_sale',
        'price_purchase',
    ];



    public function itemUnit()
    {
        return $this->belongsTo(ItemUnit::class, 'item_unit_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
}
