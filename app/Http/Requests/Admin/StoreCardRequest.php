<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreCardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->can('create card');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'status'        => 'sometimes|nullable|integer',
            'order'         => 'sometimes|nullable|integer',
            'title'         => 'required|string|max:255',
            'description'   => 'required|string|max:500',
            'deck_id'       => 'required|integer',
            'content_id'    => 'required|integer',
        ];
    }


    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Title alanı zorunludur!',
            'description.required' => 'Description alanı zorunludur!',
            'order.required' => 'Sıra numarası zorunludur!',
            'content_id.required' => 'Content seçmek zorunludur!',
        ];
    }
}
