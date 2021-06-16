<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => ['required' , 'string'],
            'image'     => ['nullable'],
            'is_service' => ['nullable'],
            'price_sale' => ['nullable'],
            'price_purchase'=> ['nullable'],
            'tax_id' => ['nullable'],
            'vendor_id' => ['nullable'],
            'category_id' => ['nullable'],
            'store_id' => ['nullable'],
            'unit_id' => ['nullable'],
            'currency' => ['nullable'],
            'units'  => ['nullable' , 'array'],
        ];
    }
}
