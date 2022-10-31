<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|max:150|unique:items',
            'image' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please enter product name.',
            'title.max' => 'Item name must not be greater than :max characters.',
            'image' => 'required'
        ];
    }
}
