<?php

namespace App\Http\Requests;


use App\Kupac;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class KupacRequest extends FormRequest
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
            'naziv' => [
                'required', 'min:3'
            ]


        ];
    }


}
