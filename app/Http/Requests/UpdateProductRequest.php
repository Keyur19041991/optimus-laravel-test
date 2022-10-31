<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'title' => 'required|max:50|unique:items,title,'.$this->product->id,
        ];
    }


    public function messages()
    {
        return [
            'title.required' => 'Please enter product name.',
            'title.max' => 'Item name must not be greater than :max characters.'
        ];
    }
}
