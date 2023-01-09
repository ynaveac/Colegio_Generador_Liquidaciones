<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginFormRequest extends FormRequest
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
            'email' => 'required|email',
            'clave' => 'required'
        ];
    }

    public function messages()
    {
        return[
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico no corresponde con una dirección  de email válida',
            'clave.required' => 'La contraseña es obligatorio'
        ];
    }
}
