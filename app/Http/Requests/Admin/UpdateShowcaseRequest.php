<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShowcaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->can('update showcase');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules():array
    {
        return [
            'id'            => 'sometimes|nullable|string|max:32',
            'status'        => 'sometimes|nullable|integer',
            'order'         => 'sometimes|nullable|integer',
            'title'         => 'required|string|max:255',
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
        ];
    }
}
