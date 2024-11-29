<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

//importar regra que permite usar unique
use Illuminate\Validation\Rule;

class StoreEmpresa extends FormRequest
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
            //
            'nome' => [
                'required',
                'string',
                'min: 3',
                'max: 100'
            ],

            'descricao' => [
                'required',
                'string'
            ],

            'cnpj' => [
                'required',
                'string',
                'min:14',
                //regra para validar se email é o mesmo quando usuario for editar
                Rule::unique('empresas', 'cnpj')->ignore($this->id, 'id')
            ],

            'endereco' => [
                'required',
                'string',
                'min: 3'
            ],

            'telefone' => [
                'required',
                'string',
                'min:10'
            ],

            'icone' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'banner' => 'image|mimes:jpeg,png,jpg,gif,svg|max:100048'
        ];
    }
}
