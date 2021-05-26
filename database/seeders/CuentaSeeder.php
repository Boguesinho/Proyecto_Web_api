<?php

namespace Database\Seeders;

use App\Models\Cuenta;
use Illuminate\Database\Seeder;


class CuentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cuenta = new Cuenta();
        $cuenta->idUsuario = 1;
        $cuenta->nombre = 'Luis Rodrigo';
        $cuenta->idPais = 1; //México
        $cuenta->edad = 21;
        $cuenta->genero = 'Masculino';
        $cuenta->info = 'Info prueba user 1';
        $cuenta->save();

        $cuenta = new Cuenta();
        $cuenta->idUsuario = 2;
        $cuenta->nombre = 'Alejandro';
        $cuenta->idPais = 1;
        $cuenta->edad = 22;
        $cuenta->genero = 'Masculino';
        $cuenta->info = 'Info prueba user 2';
        $cuenta->save();

        $cuenta = new Cuenta();
        $cuenta->idUsuario = 3;
        $cuenta->nombre = 'Cesar';
        $cuenta->idPais = 1;
        $cuenta->edad = 22;
        $cuenta->genero = 'Masculino';
        $cuenta->info = 'Info prueba user 3';
        $cuenta->save();
    }
}
