<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEntrevista extends FormRequest
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
            'status' => [
                'required'
            ],

            'data' => [
                'required',
                'date'
            ],

            'hora' => [
                'required',
                'max: 5'
            ],

            'local' => [
                'required',
                'string',
                'min: 5',
                'max: 255',
            ]
        ];
    }
}
