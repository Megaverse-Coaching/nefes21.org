<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->can('update content');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'             => 'required|string|max:255',
            'status'            => 'sometimes|nullable|boolean',
            'type'              => 'sometimes|array|distinct',
            'age'               => 'nullable|string:General,12-18,19-26,27-35,36-45,45+|max:7',
            'gender'            => 'nullable|string:General,Male,Female,Private|max:7',
            'isNew'             => 'sometimes|nullable|boolean',
            'isValid'           => 'sometimes|nullable|boolean',
            'isFree'            => 'sometimes|nullable|boolean',
            'description'       => 'required|string|max:500',
            'author_id'          => 'required|integer',
            'imgCover'          => 'image|mimes:jpeg,png,jpg,webp|max:4096|sometimes', // |dimensions:width=1000,height=750
            'imgShowcase'       => 'image|mimes:jpeg,png,jpg,webp|max:4096|sometimes', // |dimensions:width=2000,height=1500
            'cover_remove'      => 'sometimes|nullable|boolean',
            'showcase_remove'   => 'sometimes|nullable|boolean',
            'id'         => 'sometimes|nullable|integer',
            'version'    => 'sometimes|nullable|integer',
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
            'imgCover.dimensions' => 'Cover Image için genişlik:1000px, uzunluk:750px olmalı! (1000x750)',
            'imgShowcase.dimensions' => 'Showcase Image için genişlik:2000px, uzunluk:1500px olmalı! (2000x1500)',
            'label.required' => 'Label alanı zorunludur!',
            'file.required' => 'Dosya alanı zorunludur!',
            'order.required' => 'Sıra numarası zorunludur!',
            'duration.string' => 'Dosyayı tekrardan seçiniz!',
            'description.required' => 'Max. 500 karakter uzunluğunda bir açıklama eklemelisiniz!',
            'age.required' => 'Yaş aralığı belirtin veya Genel\'i seçin!',
            'gender.required' => 'Cinsiyet belirtin veya Genel\'i seçin!',
            'admin_id.required' => 'Yazar alanını boş bırakılamaz!',
            'type.required' => 'En az bir ya da daha fazla Content Type seçiniz!',
        ];
    }




}


