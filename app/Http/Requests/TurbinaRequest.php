<?php

namespace App\Http\Requests;


use App\Turbina;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TurbinaRequest extends FormRequest
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
            'oem' => [
                'required'
            ],
            'cijena' => [
                'required'
            ]


        ];
    }


}
