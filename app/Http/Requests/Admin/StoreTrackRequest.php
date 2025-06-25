<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreTrackRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->can('create track');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //'id'      => 'sometimes|nullable|integer',
            'source_id'      => 'sometimes|nullable|integer',
            'title'         => 'required|string|max:255',
            //'label'         => 'required|string|max:255',
            'link'          => 'nullable|string|max:255',
            'order'         => 'required|integer',
            'admin_id'       => 'required|integer',
            'content_id'       => 'required|integer',
            'soundscape_id' => 'sometimes|nullable|integer',
            'isValid'       => 'sometimes|nullable|boolean',
            'isFree'        => 'sometimes|nullable|boolean',
            'track'         => 'bail|exclude_if:has_file,true|mimes:mp3,m4a,mp4,m4r,mpg,mp4|max:102400', // bail = Stop running validation rules after the first validation failure.
            'duration'      => 'required|string',
            'volume'        => 'required|string|max:255',
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
            'label.required' => 'Label alanı zorunludur!',
            'file.required' => 'Dosya alanı zorunludur!',
            'order.required' => 'Sıra numarası zorunludur!',
            'admin_id.required' => 'Anlatıcı seçmek zorunludur!',
            'duration.string' => 'Dosyayı seçmek zorunlu!',
            'duration.required' => 'Dosya süresini girmek zorunludur!',
        ];
    }
}
