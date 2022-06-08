<?php

namespace App\Models;

use App\Models\Resource\Alloggio;

class Catalogo
{
    public function ritornaAlloggi(){
        return Alloggio::paginate(5);
    }
    
    public function filtraggioIniziale($citta, $tipo){
        $cittalower=strtolower($citta);
        return Alloggio::whereRaw('lower(Citta) like (?)',["%{$cittalower}%"] )->where('Tipo', $tipo)->paginate(5);
    }
    public function filtraggioInizialeAlloggio($tipo){
        return Alloggio::where('Tipo', $tipo)->paginate(5);
    }
    public function filtraggioInizialeCitta($citta){
        $cittalower=strtolower($citta);
        return Alloggio::whereRaw('lower(Citta) like (?)',["%{$cittalower}%"] )->paginate(5);
    }
    public function getlastid(){
        return Alloggio::orderBy('ID', 'desc')->first();
    }

    //per le stats dell'admin, ritorna il conto di tutte le offerte di alloggi presenti nel sito
    public function getTutteOfferte($tipo, $inizio, $fine){
        if($tipo=='Tutti') {
             $tutte_offerte = Alloggio::where('created_at', [$inizio, $fine])
                       ->count('ID');
        }

        else{
             $tutte_offerte = Alloggio::where('Tipo', '=', $tipo)->whereBetween('created_at', [$inizio, $fine])
                      ->count('ID');
        }
        return  $tutte_offerte;
    }
}
