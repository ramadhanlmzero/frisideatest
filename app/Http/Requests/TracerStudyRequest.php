<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class TracerStudyRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'school_id' => 'nullable|exists:table_school,id',
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'target_start' => 'required|date',
            'target_end' => 'required|date|after_or_equal:target_start',
            'publication_start' => 'required|date',
            'publication_end' => 'required|date|after_or_equal:publication_start',
        ];
    }

    /**
     * Get the validation rules messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => ':attribute wajib diisi!',
            'school_id.exists' => ':attribute yang anda masukkan tidak tersedia di data master sekolah!',
            'name.max' => ':attribute maksimal 255 karakter!',
            'description.max' => ':attribute maksimal 255 karakter!',
            'date' => ':attribute wajib berformat tanggal!',
            'target_end.after_or_equal' => ':attribute tidak boleh mendahului tanggal target awal!',
            'publication_end.after_or_equal' => ':attribute tidak boleh mendahului tanggal publikasi awal!',
        ];
    }

    /**
     * Get the validation rules attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'school_id' => 'Sekolah',
            'name' => 'Nama',
            'description' => 'Deskripsi',
            'target_start' => 'Tanggal target awal',
            'target_end' => 'Tanggal target akhir',
            'publication_start' => 'Tanggal publikasi awal',
            'publication_end' => 'Tanggal publikasi akhir',
        ];
    }
}
