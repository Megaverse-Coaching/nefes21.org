<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreDimensionLayoutsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->can('create dimension');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'id'                => 'required|integer',
            'category_id'       => 'required|nullable|string|max:32',
            'content_id'        => 'required|integer|max:6',
            'dimension_id'      => 'required|nullable|string|max:32',
            'showcase_id'       => 'required|nullable|string|max:32',
            'soundscape_id'     => 'sometimes|integer|max:7',
            'category_order'    => 'sometimes|integer',
        ];
    }
}
