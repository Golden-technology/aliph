<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'tax_id_number',
        'contact',
        'fax',
        'mobile',
        'website'
    ];

    public function initials()
    {
        return $this->hasMany(InitialInvoice::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
