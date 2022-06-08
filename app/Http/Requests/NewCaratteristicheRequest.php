<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewCaratteristicheRequest extends FormRequest
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
            'Ripostiglio' => 'nullable',
            'Sala' => 'nullable',
            'SessoRichiesto' => 'required|max:1',
            'WiFi'=>'required',
            'Garage' => 'nullable',
            'AngoloStudio' => 'required',
            'NumeroLocali' => 'nullable',
            'PostiLettoStanza' => 'nullable',
            'NumBagni' => 'nullable',
            'PostiLettoTot' => 'nullable',
            'EtaMinima' => 'required',
            'NumStanzeLetto' => 'nullable'
        ];
    }
}
