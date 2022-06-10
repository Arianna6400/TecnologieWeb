<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DateTime;

class Utenti extends Authenticatable {
    protected $table ='utenti';
    protected $primaryKey = 'Username';

    protected $keyType = 'string';


    use Notifiable;

     protected $fillable = [
         'Nome','Cognome','Username','Sesso','DataNascita','password','role',
     ];

     protected $hidden = [
        'password', 
     ];

     protected $casts = [
         'DataNascita' => 'datetime',
     ];

     public function hasRole($tipo) {
         $tipo = (array)$tipo;
         return in_array($this->Tipo, $tipo);
     }
}
