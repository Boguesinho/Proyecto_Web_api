<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
     public function run()
    {
        $usuario = new User();
        $usuario->email = 'admin1@gmail.com';
        $usuario->password = Hash::make('ola12345');
        $usuario->nombre = 'Luis Rodrigo';
        $usuario->idPais = 1; //México
        $usuario->edad = 21;
        $usuario->idGenero = 1;
        $usuario->info = 'Info prueba user 1';
        $usuario->save();

        $usuario = new User();
        $usuario->email = 'ale123@gmail.com';
        $usuario->password = Hash::make('ola12345');
        $usuario->nombre = 'Alejandro';
        $usuario->idPais = 1; //México
        $usuario->edad = 21;
        $usuario->idGenero = 3;
        $usuario->info = 'Info prueba user 2';
        $usuario->save();

        $usuario = new User();
        $usuario->email = 'cesar10@gmail.com';
        $usuario->password = Hash::make('ola12345');
        $usuario->nombre = 'César';
        $usuario->idPais = 1; //México
        $usuario->edad = 29;
        $usuario->idGenero = 1;
        $usuario->info = 'Info prueba user 3';
        $usuario->save();
    }
}
