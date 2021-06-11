<?php

namespace Database\Seeders;

use App\Models\Genero;
use Illuminate\Database\Seeder;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genero = new Genero();
        $genero->nomGenero = 'Masculino';
        $genero->save();

        $genero = new Genero();
        $genero->nomGenero = 'Femenino';
        $genero->save();

        $genero = new Genero();
        $genero->nomGenero = 'Prefiero no decirlo';
        $genero->save();

    }
}
