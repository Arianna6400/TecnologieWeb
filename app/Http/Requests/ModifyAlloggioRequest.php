<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModifyAlloggioRequest extends FormRequest
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
            "Citta" => "alpha|max:200",
            "Via" => "max:200",
            "NumCivico" => "numeric",
            "Costo" => "numeric",
            "PeriodoInizio" => "date",
            "PeriodoFine" => "date|after_or_equal:PeriodoInizio",
            "Metratura" => "numeric",
            "Descrizione" => "min:15|max:200",
            "Ripostiglio" => "boolean",
            "Sala" => "boolean",
            "SessoRichiesto" => "alpha",
            "Wifi" => "boolean",
            "Garage" => "boolean",
            "AngoloStudio" => "boolean",
            "NumeroLocali" => "numeric",
            "NumBagni" => "numeric",
            "PostiLettoTot" => "numeric",
            "NumStanzeLetto" => "numeric",
            "EtaMinima" => "numeric",
        ];
    }
}
