<?php

namespace App\Http\Requests\Admin;

use App\Models\Admin\Admin;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAuthorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->can('update author');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name'                      => 'required|string|max:32',
            'surname'                   => 'required|string|max:32',
            'label'                     => 'required|string|max:64',
            'title'                     => 'sometimes|nullable|string|max:64',
            'position'                  => 'sometimes|nullable|string|max:64',
            'admin_id'                  => ['sometimes', Rule::exists(Admin::class, 'id')],
            'headerImageUrl'            => 'image|mimes:jpeg,png,jpg,webp|max:4096|sometimes', // |dimensions:width=1000,height=750
            'profilePicUrl'             => 'image|mimes:jpeg,png,jpg,webp|max:4096|sometimes', // |dimensions:width=2000,height=1500
            'headerImageUrl_remove'     => 'sometimes|nullable|boolean',
            'profilePicUrl_remove'      => 'sometimes|nullable|boolean',
            'status'                    => 'sometimes|nullable|boolean',
            'isConsulting'              => 'sometimes|nullable|boolean',
            'info'                      => 'required|string|max:1500',
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
            'admin_id.required' => 'Admin seçmek zorunludur!',
            'info.max' => 'Info alanı 1500 karakterden uzun olamaz!',
        ];
    }
}
