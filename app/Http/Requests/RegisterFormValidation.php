<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormValidation extends FormRequest
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


    
    public function rules()
    {
        return [
            'email' => 'required|unique:users|email',
            'name' => 'required',
            'phone' => 'required',
            'password' => 'required|same:password_confirmation',
            'password_confirmation' => 'required'
           
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'email.required' => 'O campo email é obrigatório',
            'email.unique' => 'Email já cadastrado',
            'phone.required' => 'O campo phone é obrigatório',
            'phone.unique' => 'Phone já cadastrado',
            'password.required' => 'O campo senha é obrigatório',
            'password.confirmed' => 'As senhas não são iguais'
        ];
    }
}
