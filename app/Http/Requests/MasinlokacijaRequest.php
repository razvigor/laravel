<?php

namespace App\Http\Requests;

use App\Masinlokacija;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class MasinlokacijaRequest extends FormRequest
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
                'required', 'min:3', Rule::unique((new Masinlokacija)->getTable())->ignore($this->route()->masinlokacija->id ?? null)
            ],
            'teh_koef' => [
                'required', 'min:1'
            ]
        ];
    }
}
