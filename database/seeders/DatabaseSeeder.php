<?php

namespace Database\Seeders;

use App\Models\Interes;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PaisSeeder::class);
        $this->call(GeneroSeeder::class);
        $this->call(InteresSeeder::class);
        $this->call(UsuarioSeeder::class);
    }
}
