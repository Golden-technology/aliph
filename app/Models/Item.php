<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'is_service',
        'price_sale',
        'price_purchase',
        'tax',
        'image',
        'vendor_id',
        'category_id',
        'unit_id',
        'currency'
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }


    public function setImageAttribute($value)
    {
        if(!$value) {
            return ;
        }

        $this->attributes['image'] = $this->uploadImage($value);

    }

    public function uploadImage($image) {
        $name_image_rand = rand(0 , 100000);
        $fileupload = $image;
        $extention  = $fileupload->getClientOriginalExtension();
        $path       = $fileupload->move(public_path('images/items'), '/' . 'image_' . time() . $name_image_rand .'.' . $extention);
        $nameimage = '/images/items' .  '/image_' . time() . $name_image_rand .  '.' . $extention;
        return $nameimage;
    }


}
