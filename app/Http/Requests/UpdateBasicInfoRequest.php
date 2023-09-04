<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBasicInfoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'phone' => 'nullable|numeric',
            'address' => 'nullable|min:3',
            'email' => 'nullable|email',
            'meta_title' => 'required | max:100',
            'meta_description' => 'required | min:50 | max:255',
            'meta_picture' => 'nullable | image | max:10000',
        ];

    }
}
