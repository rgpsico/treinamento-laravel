<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImovelStoreRequest extends FormRequest
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
        return[
            'title' => 'required',
            'address' => 'required',
            'price' => 'required',
            'avatar' => 'required'
        ];
    }

    public function messages()
{
    return [
        'title.required' => 'O título é obrigatório',
        'address.required' => 'O endereço é obrigatório',
        'price.required' => 'O preço é obrigatório',
        'avatar.required' => 'A foto do imovel é obrigatória',
    ];
}

}
