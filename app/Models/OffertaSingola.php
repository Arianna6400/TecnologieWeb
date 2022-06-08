<?php

namespace App\Models;

use App\Models\Resource\Alloggio;
use App\Models\Resource\Caratteristiche;

class OffertaSingola 
{
    public function findAlloggioID($id){
       return Alloggio::find($id);
    }
    
    public function getAlloggioSelezionato($alloggio) {
        return Alloggio::where('alloggio.ID', $alloggio->ID)->join('caratteristiche', 'caratteristiche.ID', '=', 'alloggio.ID')->first();
    }
}
