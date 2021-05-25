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
        $usuario->save();

        $usuario = new User();
        $usuario->email = 'ale123@gmail.com';
        $usuario->password = Hash::make('ola12345');
        $usuario->save();

        $usuario = new User();
        $usuario->email = 'cesar10@gmail.com';
        $usuario->password = Hash::make('ola12345');
        $usuario->save();
    }
}
