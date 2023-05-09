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
        return [
            'title' => 'required',
            'address' => 'required',
            'price' => 'required',
            'type' => 'required',
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'O título é obrigatório',
            'address.required' => 'O endereço é obrigatório',
            'price.required' => 'O preço é obrigatório',
            'type.required' => 'O tipo de imovel é obrigatório',
            'status.required' => 'O imovel esta vago ?',
        ];
    }
}
