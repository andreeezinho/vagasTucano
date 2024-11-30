<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVaga extends FormRequest
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
            'nome' => [
                'required',
                'string',
                'min: 5',
                'max: 150'
            ],

            'descricao' => [
                'required',
                'string',
                'min: 3'
            ],

            'status' => [
                'required'
            ],

            'tipo' => [
                'required',
                'string',
                'min: 2',
                'max: 100'
            ],

            'data_fechamento' => [
                'required',
                'date'
            ]
        ];
    }
}
