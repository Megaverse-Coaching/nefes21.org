<?php

namespace App\Http\Requests\Admin;

use App\Models\Admin\Admin;
use App\Models\Admin\Content;
use App\Models\Admin\DeckLayout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('update card');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'daily'        => 'sometimes|nullable|integer',
            'order'         => 'sometimes|nullable|integer',
            'title'         => 'required|string',
            'description'   => 'nullable|string',
            'deck_id'       => 'required|integer',
            'updated_by'    => 'sometimes|nullable|integer',
            'content_id'    => ['required', Rule::exists(Content::class, 'id')],
            'card_id'       => ['required', Rule::exists(DeckLayout::class, 'id')],
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
