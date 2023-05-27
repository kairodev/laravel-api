<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'modelo' => 'required|max:255',
            'marca' => 'required|max:30',
            'ano_modelo' => 'required|min:4|max:4|regex:/^[0-9]+$/',
        ];
    }


    public function messages()
    {
        return [
            'modelo.required' => 'modelo requirido',
            'modelo.max' => 'modelo excede maximo de 255 caracteres',
            'marca.required' => 'marca requirida',
            'marca.max' => 'marca excede maximo de 30 caracteres',
            'ano_modelo.required' => 'ano_modelo requirido',
            'ano_modelo.regex' => 'ano_modelo utiliza apenas numeros',
            'ano_modelo.min' => 'ano_modelo precisa ter 4 digitos',
            'ano_modelo.max' => 'ano_modelo excede maximo de 4 digitos',
        ];
    }

}
