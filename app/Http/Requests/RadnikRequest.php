<?php

namespace App\Http\Requests;


use App\Radnik;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RadnikRequest extends FormRequest
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
                'required', 'min:3'
            ],
            'jmbg' => [
                'required'
            ],
            'birthday' => [
                'required',
                'date_format:Y-m-d'
            ]


        ];
    }


}
