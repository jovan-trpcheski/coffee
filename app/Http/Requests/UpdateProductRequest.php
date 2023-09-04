<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required | max:50 ',
            'description' => 'nullable | max:250',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'photo' => 'nullable | image | mimes:jpeg,png,jpg,gif,tiff,tif,avif |max:128'
        ];
    }
}
