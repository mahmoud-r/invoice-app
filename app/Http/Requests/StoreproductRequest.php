<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreproductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|unique:Products,name,'.$this->id,
            'name_ar' => 'required|unique:Products,name,'.$this->id,
            'categorie_id' => 'required',
        ];
    }
}
