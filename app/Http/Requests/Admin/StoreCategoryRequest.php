<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->can('create category');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules():array
    {
        return [
            'category'  => 'sometimes|nullable|string|max:32',
            'dimension_id'  => 'sometimes|nullable|string|max:32',
            'status'        => 'sometimes|nullable|integer',
            'order'         => 'sometimes|nullable|integer',
            'title'         => 'filled|string|max:255',
            'description'   => 'filled|string|max:1000',
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
            'description.max' => 'Description alanı max 1000 karakter uzunluğunda olmalı!',
        ];
    }
}
