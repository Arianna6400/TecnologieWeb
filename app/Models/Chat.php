<?php

namespace App\Models;
use App\Models\Resource\Messaggio;
use App\Models\Resource\Alloggio;
use App\Models\Resource\Riferimento;

class Chat
{
    public function showChatDest($username){
        return Messaggio::where('Destinatario', $username)->orderBy('Data','desc')->orderBy('Orario','desc')->get();
    }

    public function showChatMitt($username){
        return Messaggio::Where('Mittente', $username)->orderBy('Data','desc')->orderBy('Orario','desc')->get();
    }
    
    public function destinatarioByIdMessaggio($id){
        return Messaggio::where('ID', $id)->first();
    }
    
    public function lista($messaggi){
        $arrayId = [];
        foreach($messaggi as $messaggio){
            array_push($arrayId, $messaggio->ID);
        }
        $arrayDestinatario = [];
        foreach($arrayId as $id){
            array_push($arrayDestinatario, Messaggio::where('ID',$id)->select('Destinatario')->first());
        }
        return array_combine($arrayId, $arrayDestinatario);
    }
}
