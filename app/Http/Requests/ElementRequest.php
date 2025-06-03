<?php

namespace App\Http\Requests;


use App\Element;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ElementRequest extends FormRequest
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
            'proizvod_id' => [
                'required'
            ],
            'sklop' => [
                'required'
            ],
            'id_nadredjenog' => [
                'required'
            ]

        ];
    }


}
