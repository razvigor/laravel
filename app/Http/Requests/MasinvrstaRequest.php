<?php

namespace App\Http\Requests;

use App\Masinvrsta;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class MasinvrstaRequest extends FormRequest
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
                'required', 'min:3', Rule::unique((new Masinvrsta)->getTable())->ignore($this->route()->masinvrsta->id ?? null)
            ],
            'description' => [
                'nullable', 'min:5'
            ]
        ];
    }
}
