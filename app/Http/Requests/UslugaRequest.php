<?php

namespace App\Http\Requests;


use App\Usluga;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UslugaRequest extends FormRequest
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
            'opis' => [
                'required', 'min:3'
            ],
            'cijena' => [
                'required'
            ]


        ];
    }


}
