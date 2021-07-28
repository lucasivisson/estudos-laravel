<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:100|',
            'number' => 'required|numeric',
            'category' => 'required',
            'description' => 'required|min:3|max:1000' // O usuário não é obrigado a colocar nada, mas se ele preencher, a quantidade minima é 3 e a máxima é 1000.
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é de preenchimento obrigatório',
            'name.min' => 'O número mínimo de caracteres do campo nome é 3',
            'name.max' => 'O número máximo de caracteres do campo nome é 100',
            'number.numeric' => 'O campo número só aceita números',
            'number.required' => 'O campo número é de preenchimento obrigatório',
            'category.required' => 'O campo de categoria é de preenchimento obrigatório',
            'description.required' => 'O campo nome é de preenchimento obrigatório',
            'description.min' => 'O número mínimo de caracteres do campo descrição é 3',
            'description.max' => 'O número máximo de caracteres do campo descrição é 1000',
        ];
    }
}
