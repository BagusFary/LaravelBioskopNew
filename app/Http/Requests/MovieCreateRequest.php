<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieCreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'judul' => 'max:50',
            'deskripsi'=> 'max:800'
        ];
    }

    public function messages()
{
    return [
        'judul.max' => 'Maksimal Judul :max Karakter',
        'deskripsi.max' => 'Maksimal Deskripsi :max Karakter',
    ];
}

}
