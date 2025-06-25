<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMoodRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->can('update mood');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'mood_id'  => 'required|string|max:32',
            'content_id'  => 'required|numeric|max_digits:6',
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
            'mood_id.required' => 'Mood ID alanı zorunludur!',
            'mood_id.max' => 'Mood ID adı max 32 karakter uzunluğunda olmalı!',
            'content_id.required' => 'Content ID alanı zorunludur!',
            'content_id.max' => 'Content ID max 6 karakter uzunluğunda olmalı!',
            'content_id.numeric' => 'Content ID sayısal bir değere sahip olmalı!',
        ];
    }
}
