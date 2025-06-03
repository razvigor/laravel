<?php

namespace App\Http\Requests;


use App\StavkaRN;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StavkarnRequest extends FormRequest
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
            'rnalog_id' => [
                'required'
            ],
            'kupac_id' => [
                'required'
            ],
            'proizvod_id' => [
                'required'
            ]


        ];
    }


}
