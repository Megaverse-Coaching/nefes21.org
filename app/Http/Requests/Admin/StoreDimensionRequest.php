<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreDimensionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create dimension');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id'            => 'sometimes|nullable|string|max:32',
            'status'        => 'sometimes|nullable|integer',
            'order'         => 'sometimes|nullable|integer',
            'title'         => 'sometimes|string|max:255',
            'description'   => 'sometimes|string|max:1000',
        ];
    }



    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages():array
    {
        return [
            'title.required' => 'Title alanı zorunludur!',
            'title.max' => 'Title alanı max 255 karakter uzunluğunda olmalı!',
            'description.required' => 'Description alanı zorunludur!',
            'description.max' => 'Description alanı max 255 karakter uzunluğunda olmalı!',
        ];
    }
}
