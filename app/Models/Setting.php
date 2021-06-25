<?php

namespace App\Models;

use App\Traits\HasImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    use HasImage;

    protected $fillable = ['invoice_template'];

    public function setInvoiceTemplateAttribute($value)
    {
        if(!$value) {
            return ;
        }
        $this->attributes['invoice_template'] =  $this->uploadImage($value);
    }
}
