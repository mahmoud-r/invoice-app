<?php

namespace App\Http\Requests;

use App\Models\product;
use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {

        return [
            'invoices_number' => 'unique:invoices,invoices_number,'.$this->id,
            'invoices_date' => 'required|before:tomorrow',
            'client_name' => 'required',
            'client_phone' => 'required|min:11|numeric',
            'status' => 'nullable',
            'notes' => 'nullable',
//
        ];
    }
}
