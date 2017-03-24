<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
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
            'uuid'      => 'required',
            'name'      => 'required',
            'email'     => 'required|email|unique:users,email,' . $this->request->get('uuid') . ',uuid',
            'password'  => 'confirmed',
        ];
    }
}
