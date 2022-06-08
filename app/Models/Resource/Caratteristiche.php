<?php

namespace App\Models\Resource;

use Illuminate\Database\Eloquent\Model;

class Caratteristiche extends Model
{
    protected $table = 'caratteristiche';
    protected $primaryKey = 'ID';
    protected $guarded = ['ID'];
    public $timestamps = false;
}
