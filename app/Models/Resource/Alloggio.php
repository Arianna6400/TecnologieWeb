<?php

namespace App\Models\Resource;

use Illuminate\Database\Eloquent\Model;

class Alloggio extends Model
{
   protected $table = 'alloggio';
   protected $primaryKey = 'ID';
   protected $guarded = ['ID'];
   public $timestamps = false;

}
