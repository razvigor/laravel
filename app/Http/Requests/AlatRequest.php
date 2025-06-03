<?php

namespace App\Http\Requests;


use App\Alat;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AlatRequest extends FormRequest
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

            'alatnaziv_id' => [
                'required'
            ],
            'proizvodjac_id' => [
                'required'
            ]


        ];
    }


}
