<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
//Comando para crear el request: php artisan make:request UserRequest
class UserRequest extends FormRequest
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
            'name'  => 'min:4|max:120|required',
            'email' => 'min:4|max:255|unique:users|required'
        ];
    }
}
