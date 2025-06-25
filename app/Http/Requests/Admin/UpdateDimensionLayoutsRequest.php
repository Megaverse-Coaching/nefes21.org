<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDimensionLayoutsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->can('update dimension');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'id'                => 'sometimes|nullable|integer',
            'category_id'       => 'sometimes|nullable|integer',
            'dimension_id'      => 'sometimes|nullable|integer',
            'showcase_id'       => 'sometimes|nullable|integer',
            'content_id'        => 'sometimes|nullable|integer',
            'soundscape_id'     => 'sometimes|nullable|integer',
            'category_order'    => 'sometimes|nullable|integer',
        ];
    }
}
