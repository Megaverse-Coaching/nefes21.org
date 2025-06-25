<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreContentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->can('create content');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title'         => 'required|string|max:255',
            'type'          => 'required|array|distinct',
            'age'           => 'required|string:General,12-18,19-26,27-35,36-45,45+|max:7',
            'gender'        => 'required|string:General,Male,Female,Private|max:7',
            'isNew'         => 'sometimes|nullable|boolean',
            'isValid'       => 'sometimes|nullable|boolean',
            'isFree'        => 'sometimes|nullable|boolean',
            'status'        => 'sometimes|nullable|boolean',
            'description'   => 'required|string|max:500',
            'admin_id'      => 'required|integer',
            'imgCover'      => 'required|image|mimes:jpeg,png,jpg,webp|max:4096|dimensions:width=1000,height=750', // 
            'imgShowcase'   => 'required|image|mimes:jpeg,png,jpg,webp|max:4096|dimensions:width=2000,height=1500', // 
            'cover_remove'  => 'sometimes|nullable|boolean',
            'showcase_remove' => 'sometimes|nullable|boolean',
            'id'         => 'sometimes|nullable|integer',
            'version'    => 'sometimes|nullable|integer',
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
            'title.required' => 'Başlık yazmanız gerekir!',
            'title.max' => 'Başlık, en fazla 255 karakter uzunluğunda olabilir!',
            'imgCover.required' => 'Cover görseli yüklemelisiniz!',
            'imgShowcase.required' => 'Showcase görseli yüklemelisiniz!',
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
            'type.required' => 'En az bir ya da daha fazla Content Type seçiniz!'
        ];
    }
}
