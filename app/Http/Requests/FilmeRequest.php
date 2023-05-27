<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilmeRequest extends FormRequest
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
            'nome' => 'required|max:255',
            'ano' => 'required|min:4|max:4|regex:/^[0-9]+$/',
        ];
    }


    public function messages()
    {
        return [
            'nome.required' => 'nome requirido',
            'nome.max' => 'nome excede maximo de 255 caracteres',
            'ano.required' => 'ano requirido',
            'ano.regex' => 'ano utiliza apenas numeros',
            'ano.min' => 'ano precisa ter 4 digitos',
            'ano.max' => 'ano excede maximo de 4 digitos',
        ];
    }
}
