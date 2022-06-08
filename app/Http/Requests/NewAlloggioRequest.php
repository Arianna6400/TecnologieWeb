<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewAlloggioRequest extends FormRequest
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
            'Citta' => 'required|max:25',
            'Via' => 'required',
            'NumCivico' => 'required',
            'Costo' => 'required',
            'PeriodoInizio' => 'required',
            'PeriodoFine' => 'required',
            'Metratura' => 'required',
            'Disponibilita' => 'required',
            'Descrizione' => 'required',
            'Tipo' => 'required|max:14',
            'Foto' => 'required|max:150',
        ];
    }
}
