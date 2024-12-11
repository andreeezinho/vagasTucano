<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmpresa extends StoreEmpresa
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
        //permite criar regra personalizada no request
        $rules = parent::rules();

        return [
            //permite icone passar como nulo
            $rules['icone'] = [
                'nullable',
                'image|mimes:jpeg,png,jpg,gif,svg|max:10240'
            ],

            //permite banner passar como nulo
            $rules['banner'] = [
                'nullable',
                'image|mimes:jpeg,png,jpg,gif,svg|max:10240'
            ],
        ];
    }
}
