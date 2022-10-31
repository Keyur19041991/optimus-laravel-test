<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
            'title' => 'required|max:50|unique:items',
            'image' => 'required'
        ];
    }


    public function messages()
    {
        return [
            'title.required' => 'Please enter category name.',
            'title.max' => 'Category name must not be greater than :max characters.',
            'image' => 'required'
        ];
    }
}
