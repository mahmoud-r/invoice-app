<?php

namespace App\Http\Requests;

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
            'invoices_date' => 'required|date_format:Y-m-d|before:tomorrow'.$this->id,
            'categorie_id' => 'required'.$this->id,
            'product_id' => 'required'.$this->id,
            'price' => 'required|'.$this->id,
            'disconunt' => 'nullable'.$this->id,
            'text_rate' => 'nullable'.$this->id,
            'text_value' => 'nullable'.$this->id,
            'after_disconunt' => 'nullable'.$this->id,
            'status' => 'nullable'.$this->id,
            'notes' => 'nullable'.$this->id,
        ];
    }
}
