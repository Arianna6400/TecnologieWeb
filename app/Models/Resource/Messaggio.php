<?php

namespace App\Models\Resource;

use Illuminate\Database\Eloquent\Model;

class Messaggio extends Model
{
    protected $table = 'messaggio';
    protected $primaryKey = 'ID';
    protected $guarded = ['ID'];
    public $timestamps = false;
}
