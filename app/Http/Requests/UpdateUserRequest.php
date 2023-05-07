<?php

namespace App\Http\Requests;

use App\Rules\ValidarCep;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email,' . $this->route('id'),
            'phone' => 'required|string|max:255',
            'cep' => ['nullable', 'string', new ValidarCep],
        ];
    }
}
