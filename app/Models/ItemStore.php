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
        'item_id',
        'store_id',
        'unit_id',
        'quantity',
    ];



    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class , 'unit_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
}
