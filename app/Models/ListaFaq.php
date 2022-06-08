<?php

namespace App\Models;

use App\Models\Resource\Faq;

class ListaFaq 
{
    public function ritornaFaq(){
        return Faq::all();
    }
}
