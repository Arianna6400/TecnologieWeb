<?php

namespace App\Models;

use App\Utenti;
use App\Models\Resource\Interazione;
use App\Models\Resource\Alloggio;

class MieOfferte
{
    //funzione che cerca in interazione gli alloggi(ID) caricati da un utente (username) e torna gli alloggi
    public function alloggiCaricati($username){
        $arrayID = Interazione::where('Username', $username)->select('ID')->get();
        $alloggiCaricati = [];
        foreach($arrayID as $id)
        {
            //mettiamo il metodo first perchè ritorna un stdObject, con get non funziona perchè ritorna una Collection
            array_push($alloggiCaricati, Alloggio::where('ID', $id->ID)->first());
        }
        return $alloggiCaricati;
    }
    public function eliminaAlloggioById($id){
        Alloggio::where('ID', $id)->delete();
    }
// questa funzione va collegata al bottone elimina
}
