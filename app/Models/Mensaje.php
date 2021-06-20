<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User', 'idUsuario');
    }

    public function chat(){
        return $this->belongsTo('App\Models\Chat', 'idChat');
    }

}
