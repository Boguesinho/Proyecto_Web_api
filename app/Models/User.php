<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $fillable = [
        'email',
        'password',
        'nombre',
        'idPais',
        'edad',
        'idGenero',
        'info',
        'rutaFoto'
    ];

    protected $hidden = [
        'password',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function chats(){
        return $this->belongsToMany('App\Models\Chat', 'idUsuarui');
    }

    public function mensajes(){
        return $this->hasMany('App\Models\Mensaje', 'idUsuario');
    }

    public function calificaciones(){
        return $this->hasMany('App\Models\Calificacion', 'idUsuarioCalificado');
    }

    public function intereses(){
        return $this->belongsToMany('App\Models\Interes');
    }

}
