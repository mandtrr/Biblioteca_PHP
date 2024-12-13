<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Livro;

class LivroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Livro::create([
            'titulo' => 'Capitães da Areia',
            'genero' => 'Ficção',
            'idioma' => 'Português',
            'isbn' => '1234567890123',
            'ano' => 1937,
            'autor_id' => 1
        ]);
    
        Livro::create([
            'titulo' => 'Dom Casmurro',
            'genero' => 'Romance',
            'idioma' => 'Português',
            'isbn' => '1234567890124',
            'ano' => 1899,
            'autor_id' => 2
        ]);
    }
}
