<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInitialInvoice extends FormRequest
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
            'customer_id'           => ['required'],
            'status'                => ['required'],
            'customer_condition'    => ['nullable'],
            'condition'             => ['nullable'],
            'units'                 => ['nullable' , 'array'],
        ];
    }
}
