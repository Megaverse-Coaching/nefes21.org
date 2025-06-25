<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTrackRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->can('update track');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //'id' =>  'sometimes|nullable|integer',
            'source_id' =>  'sometimes|nullable|integer',
            'title'         => 'required|string|max:255',
            'has_file'      => 'nullable|string|max:255',
            //'label'         => 'nullable|string|max:255',
            'link'          => 'required|string|max:255',
            'order'         => 'required|integer',
            'admin_id'       => 'required|exists:App\Models\Admin\Admin,id|integer',
            'soundscape_id' => 'sometimes|nullable|integer',
            'isValid'       => 'sometimes|nullable|boolean',
            'isFree'        => 'sometimes|nullable|boolean',
            'duration'      => 'required|string',
            'volume'        => 'sometimes|integer|max:255',
            'track'         => 'bail|exclude_if:has_file,false|mimes:mp3,m4a,mp4,m4r,mpg,mp4|max:80000', // bail = Stop running validation rules after the first validation failure.
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
            'duration.string' => 'Dosyayı seçmek zorunlu!',
            'duration.required' => 'Dosya süresi girmek zorunlu!',
        ];
    }
}
