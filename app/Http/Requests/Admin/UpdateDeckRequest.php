<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDeckRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->can('update deck');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
//            'id'            => 'sometimes|nullable|integer',
            'title'         => 'required|string|max:255',
            'tag'           => 'required|string|max:255',
            'color'         => 'sometimes|string|max:20',
            'order'         => 'sometimes|nullable|integer',
            'status'        => 'sometimes|nullable|integer',
            'isValid'       => 'sometimes|nullable|boolean',
            'showcase'      => 'image|mimes:jpeg,png,jpg,webp|max:2048|sometimes|dimensions:width=1600,height=700',
            'front'         => 'image|mimes:jpeg,png,jpg,webp|max:2048|sometimes|dimensions:width=1000,height=1600',
            'back'          => 'image|mimes:jpeg,png,jpg,webp|max:2048|sometimes|dimensions:width=1000,height=1600',
            'background'    => 'image|mimes:jpeg,png,jpg,webp|max:2048|sometimes|dimensions:width=1000,height=1800',
            'showcase_remove'      => 'sometimes|nullable|boolean',
            'front_remove'   => 'sometimes|nullable|boolean',
            'back_remove'      => 'sometimes|nullable|boolean',
            'background_remove'   => 'sometimes|nullable|boolean',
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'showcase.dimensions' => 'Showcase Görseli için genişlik: 1600px, uzunluk:700px olmalı! (1600x700px)',
            'front.dimensions' => 'Kartın Ön Yüz görseli için genişlik: 1000px, uzunluk:1600px olmalı! (1000x1600px)',
            'back.dimensions' => 'Kartın Arka Yüz görseli için genişlik: 1000px, uzunluk:1600px olmalı! (1000x1600px)',
            'background.dimensions' => 'Arkaplan görseli için Genişlik:1600px, Uzunluk:1800px olmalı! (1000x1800px)',

            'title.required' => 'Label alanı zorunludur!',
            'tag.required' => 'Label alanı zorunludur!',
            'order.required' => 'Sıra numarası zorunludur!',
        ];
    }
}
