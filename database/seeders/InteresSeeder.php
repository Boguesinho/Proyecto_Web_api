<?php

namespace Database\Seeders;

use App\Models\Interes;
use Illuminate\Database\Seeder;

class InteresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $interes = new Interes();
        $interes->nomInteres = 'Deportes';
        $interes->save();


        $interes = new Interes();
        $interes->nomInteres = 'Arte';
        $interes->save();

        $interes = new Interes();
        $interes->nomInteres = 'Música';
        $interes->save();

        $interes = new Interes();
        $interes->nomInteres = 'Cine';
        $interes->save();

        $interes = new Interes();
        $interes->nomInteres = 'Fotografía';
        $interes->save();

        $interes = new Interes();
        $interes->nomInteres = 'Dibujo';
        $interes->save();

        $interes = new Interes();
        $interes->nomInteres = 'Idioma';
        $interes->save();

    }
}
