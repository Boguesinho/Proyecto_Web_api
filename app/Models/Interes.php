<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interes extends Model
{
    use HasFactory;

    protected $table = 'intereses';
    public $timestamps = false;

    public function users(){
        return $this->belongsToMany('App\Models\User', 'idInteres', 'idUsuario');
    }
}
