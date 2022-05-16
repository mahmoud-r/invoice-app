<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategorieRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|unique:categories,name,'.$this->id,
            'name_ar' => 'required|unique:categories,name,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'A name englich is required',
            'name_ar.required' => 'A name arabic is required',
        ];
    }
}
