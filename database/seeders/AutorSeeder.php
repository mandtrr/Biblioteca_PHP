<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Autor;

class AutorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Autor::create(['Nome' => 'Jorge', 'Apelido' => 'Amado', 'Pais' => 'Brasil']);
        Autor::create(['Nome' => 'Machado', 'Apelido' => 'de Assis', 'Pais' => 'Brasil']);
    }
}
