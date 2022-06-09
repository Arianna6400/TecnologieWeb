<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModifyProfiloRequest extends FormRequest
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
            'Nome' => 'alpha|max:25',
            'Cognome' => 'max:25',
            'DataNascita' => 'before:today',
            'Sesso' => 'max:25',
            'Username' => 'max:25',
            'password' => 'nullable|confirmed|min:8|max:25',
        ];
    }
}
