<?php

namespace App\Http\Requests;


use App\Predracun;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PredracunRequest extends FormRequest
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
            'broj' => ['required'],
            'kupc_id' => ['required'],
            'usluga_id' => ['required'],
        ];
    }


}
