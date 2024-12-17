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
    public function run()
    {
        Autor::create(['Nome' => 'Jorge', 'Apelido' => 'Amado', 'Pais' => 'Brasil']);
        Autor::create(['Nome' => 'Machado', 'Apelido' => 'de Assis', 'Pais' => 'Brasil']);
        Autor::create(['Nome' => 'Valter Hugo', 'Apelido' => 'Mãe', 'Pais' => 'Portugal']);
        Autor::create(['Nome' => 'José', 'Apelido' => 'Saramago', 'Pais' => 'Portugal']);
        Autor::create(['Nome' => 'Eça', 'Apelido' => 'de Queirós', 'Pais' => 'Portugal']);
        Autor::create(['Nome' => 'Clarice', 'Apelido' => 'Lispector', 'Pais' => 'Brasil']);
        Autor::create(['Nome' => 'J.K.', 'Apelido' => 'Rowling', 'Pais' => 'Reino Unido']);
        Autor::create(['Nome' => 'Han', 'Apelido' => 'Kang', 'Pais' => 'Coreia do Sul']); 
        Autor::create(['Nome' => 'Anne', 'Apelido' => 'Frank', 'Pais' => 'Alemanha']);
        Autor::create(['Nome' => 'Liev', 'Apelido' => 'Tolstói', 'Pais' => 'Rússia']);
        Autor::create(['Nome' => 'Fiódor', 'Apelido' => 'Dostoiévski', 'Pais' => 'Rússia']);
    }
}
