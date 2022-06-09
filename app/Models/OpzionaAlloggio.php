<?php

namespace App\Models;

use App\Models\Resource\Interazione;
use App\Models\Resource\Alloggio;
use App\Models\Resource\Caratteristiche;

class OpzionaAlloggio{

public function opziona($idAlloggio, $usenameLocatario){
    
    if(Interazione::where('Username', $usenameLocatario)->first() == [])
    {
        $num = Alloggio::find($idAlloggio);
        $numOpzionarePrec = $num->NumOpzionate;
        $num->NumOpzionate= $num->NumOpzionate + 1;
        $posti = Caratteristiche::where('ID', $idAlloggio)->select('PostiLettoTot')->first();
        if ($num->NumOpzionate == $posti->PostiLettoToT)
                $num->Disponibilita = 0;
        $num->save();
        $interazione = new Interazione;
        $interazione->Username = $usenameLocatario;
        $interazione->ID = $idAlloggio;
        $interazione->save(); 
        return $num;
    }
    else 
        $non_puo = "No";
        return $non_puo;
}

public function eta(){
         $eta = date_diff(Auth()->user()->DataNascita, date_create(date('Y/m/d', time())));
         return $eta->format('%y');
     }

}
