<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInitialInvoice extends FormRequest
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
            'customer_id'           => ['nullable'],
            'status'                => ['nullable'],
            'customer_condition'    => ['nullable'],
            'condition'             => ['nullable'],
            'items'                 => ['nullable', 'array'],
            'units'                 => ['nullable', 'array'],
            'quantity'              => ['nullable', 'array'],
            'price'                 => ['nullable', 'array'],
            'tax'                   => ['nullable'],
            'taxes'                 => ['nullable', 'array'],
            // 'discount'              => ['nullable'],
        ];
    }
}
