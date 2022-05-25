<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreitemtRequest extends FormRequest
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


    public function rules()
    {
        return [
            'invoice_id' => 'required|',
            'product_id' => 'required',
            'Quantity' => 'required|numeric|min:1,',
            'price' => 'required|numeric',
            'total' => 'required|numeric',
        ];
    }
}
