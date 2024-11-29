<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

//importar rule para usar o Unique
use Illuminate\Validation\Rule;

class StoreUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'icone' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'name' => [
                'required',
                'string',
                'min: 3',
                'max: 255'
            ],

            'cpf' => [
                'required',
                'string',
                'min: 11',
                //regra para validar se email é o mesmo quando usuario for editar
                Rule::unique('users', 'cpf')->ignore($this->id, 'id')
            ],

            'telefone' => [
                'required',
                'string',
                'min: 10'
            ],

            'email' => [
                'required',
                'string',
                //regra para validar se email é o mesmo quando usuario for editar
                Rule::unique('users', 'email')->ignore($this->id, 'id')
            ],

            'password' => [
                'required',
                'min: 8',
                'max: 100'
            ],

            'socio' => [
                'boolean',
                'nullable'
            ]
        ];
    }
}
