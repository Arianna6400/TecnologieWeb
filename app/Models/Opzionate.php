<?php

namespace App\Models;

use App\Utenti;
use App\Models\Resource\Caratteristiche;
use App\Models\Resource\Interazione;
use App\Models\Resource\Alloggio;

class Opzionate 
{
    public function opzionate($usernameLocatore){
        $arrayID = Interazione::where('Username', $usernameLocatore)->select('ID')->get();
        $alloggiOpzionati = [];
        foreach($arrayID as $id)
        {
            $opz = Alloggio::where('ID', $id->ID)->where('NumOpzionate', '>',0)->first();
            //facciamo questo controllo perchè se NumOpzionate = 0, la funzione where() ritorna null e ci dava errore se non mettevamo il seguente controllo 
            if($opz != null){
                //mettiamo il metodo first perchè ritorna un stdObject, con get non funziona perchè ritorna una Collection
                array_push($alloggiOpzionati, Alloggio::where('ID', $id->ID)->where('NumOpzionate', '>',0)->first());
            }    
        }
        return $alloggiOpzionati;
    }
    
    public function disponibili($idAlloggio){
        // l'id dell'alloggio e delle caratteristiche è lo stesso
        // ci ritorna il numero di posti totali dell'alloggio
        $postitotali = Caratteristiche::where('ID', $idAlloggio)->select('PostiLettoTot')->first();
        // ci ritorna il numero di posti opzionati dell'alloggio
        $numOpzionate = Alloggio::where('ID', $idAlloggio)->select('NumOpzionate')->first();
        echo "Posti totali $postitotali->PostiLettoTot";
        echo "Numero opzionate $numOpzionate->NumOpzionate";
        if($postitotali->PostiLettoTot == $numOpzionate->NumOpzionate) {
            $alloggio = Alloggio::find($idAlloggio);
            $alloggio->Disponibilita = 0;
            $alloggio->save();
        }
    } 

    private function listaOpzionatori($idAlloggio){
        $int = Interazione::where('ID', $idAlloggio)->select('Username')->get();
        return $this->collectionToArrayUsername(Utenti::find($this->collectionToArrayUsername($int))->where('role', 'Locatario'));
    }
    
    private function collectionToArrayUsername($collection){
        $array = [];
        foreach ($collection as $element){
            array_push($array, $element->Username);
        }
        return $array;
    }
    
    public function lista($alloggi_opzionati){
        $arrayId = [];
        foreach($alloggi_opzionati as $alloggio){
            array_push($arrayId, $alloggio->ID);
        }
        $arrayUsername = [];
        foreach($arrayId as $id){
            array_push($arrayUsername, $this->listaOpzionatori($id));
        }
        return array_combine($arrayId, $arrayUsername);
    }
    
    
    public function opzionatoLocatario($usernameLocatario){
        $id = Interazione::where('Username', $usernameLocatario)->select('ID')->first();
        if ($id != null)
            return Alloggio::where('ID', $id->ID)->get();
    }

    public function showInteressato($username){
        return Utenti::where('utenti.Username', $username)->where('utenti.role', '=', 'Locatario')
               ->join('interazione', 'interazione.Username', '=', 'utenti.Username')->first();
    }

    //per le stats dell'admin, ritorna gli alloggi totali opzionati
    public function getOpzionate($tipo, $inizio, $fine){
        if($tipo == 'Tutti') {
            $opzionate = Alloggio::whereDate('PeriodoInizio', ">=", $inizio)->whereDate('PeriodoFine', "<=", $fine)->where('NumOpzionate', '>', 0)
                         ->count('ID');
        }

        else{
            $opzionate = Alloggio::where('Tipo', '=', $tipo)->whereDate('PeriodoInizio', ">=", $inizio)->whereDate('PeriodoFine', "<=", $fine)->where('NumOpzionate', '>', 0)
                      ->count('ID');
        }
        return $opzionate;
     }

    //per le stats dell'admin, ritorna gli alloggi che non sono più opzionabili poichè già pieni
    public function getNonDisponibili($tipo, $inizio, $fine){
        if($tipo == 'Tutti') {
            $alloggi_locati = Alloggio::whereDate('PeriodoInizio', ">=", $inizio)->whereDate('PeriodoFine', "<=", $fine)
                     ->where('Disponibilita', '=', 0)->count('ID');
        }

        else{
            $alloggi_locati = Alloggio::where('Tipo', '=', $tipo)->whereDate('PeriodoInizio', ">=", $inizio)->whereDate('PeriodoFine', "<=", $fine)
                     ->where('Disponibilita', '=', 0)->count('ID');
        }
        return $alloggi_locati;
    }

}







