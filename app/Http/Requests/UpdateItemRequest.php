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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => ['required' , 'string', 'unique:items,name,' . $this->id],
            'image'     => ['nullable', 'image'],
            'is_service' => ['nullable'],
            'price_sale' => ['nullable'],
            'price_purchase'=> ['nullable'],
            'tax' => ['nullable'],
            'vendor_id' => ['nullable'],
            'category_id' => ['nullable'],
            'unit_id' => ['nullable'],
            'currency' => ['nullable'],
            // 'currency'  => ['required' , 'string'],
        ];
    }
}
