<?php

namespace App\Http\Requests;

use App\Mtag;
use App\Masina;
use App\Masinvrsta;
use App\Masinlokacija;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class MasinaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required', 'min:3', Rule::unique((new Masina)->getTable())->ignore($this->route()->masina->id ?? null)
            ],
            'masinvrsta_id' => [
                'required', 'exists:'.(new Masinvrsta)->getTable().',id'
            ],
            'masinlokacija_id' => [
                'required', 'exists:'.(new Masinlokacija)->getTable().',id'
            ],            
            'description' => [
                'required'
            ],
            'photo' => [
                $this->route()->masina ? 'nullable' : 'required', 'image'
            ],
            'status' => [
                'required',
                'in:aktivna,remont,otpisana'
            ]

        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'vrste_masina_id' => 'masinaVrsta',
            'photo' => 'picture'
        ];
    }
}
