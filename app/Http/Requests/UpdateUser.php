<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

                        //extende de Store user
class UpdateUser extends StoreUser
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
                'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ],

            $rules['password'] = [
                'nullable',
                'min: 8',
                'max: 100'
            ]
        ];
    }
}
