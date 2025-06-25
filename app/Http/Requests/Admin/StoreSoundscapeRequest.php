<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreSoundscapeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->can('create soundscape');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id'            => 'sometimes|nullable|integer',
            'status'        => 'sometimes|nullable|integer',
            'order'         => 'sometimes|nullable|integer',
            'title'         => 'required|string|max:255',
            'isValid'       => 'sometimes|nullable|boolean',
            'isFree'        => 'sometimes|nullable|boolean',
            'track'         => 'bail|exclude_if:has_file,true|mimes:mp3,m4a,mp4,m4r,mpg,mp4|max:102400', // bail = Stop running validation rules after the first validation failure.
            'duration'      => 'required|string|max:255',
            'imgCover'      => 'image|mimes:jpeg,png,jpg,webp|max:2048|required', // |dimensions:width=1000,height=750
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
            'title.required' => 'Başlık zorunludur!',
            'file.required' => 'Dosya alanı zorunludur!',
            'duration.string' => 'Dosyayı seçmek zorunlu!',
            'duration.required' => 'Ses dosyasını yüklemek zorunlu!',
            'imgCover.required' => 'Görsel dosya yüklemek zorunlu!',
            'imgCover.dimension' => 'Görsel 1000px genişlik ve 1000px uzunlukta olmalı!',
            'imgCover.max' => 'Görsel max. 2mb olmalı!',
        ];
    }
}
