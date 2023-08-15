<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nombre'=>'required|min:5',
            'email' =>'required|email:rfc,dns',
            'password'=>'required|min:6',
            'confirm' =>'required|same:password',
            'departamento'=>'required_if:tipo,users',
            'cliente'=>'required_if:tipo,clients'
        ];
    }
}
