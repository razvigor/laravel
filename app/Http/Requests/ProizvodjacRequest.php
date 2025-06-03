<?php

namespace App\Http\Requests;

use App\Proizvodjac;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProizvodjacRequest extends FormRequest
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
                'required', 'min:3', Rule::unique((new Proizvodjac)->getTable())->ignore($this->route()->proizvodjac->id ?? null)
            ]
        ];
    }
}
