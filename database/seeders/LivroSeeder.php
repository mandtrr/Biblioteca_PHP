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
        if (Livro::where('isbn', '1234567890190')->doesntExist()) {
            Livro::create([
                'titulo' => 'Capitães da Areia',
                'genero' => 'Ficção',
                'idioma' => 'Português',
                'isbn' => '1234567890190',
                'ano' => 1937,
                'autor_id' => 1
            ]);
        }

        if (Livro::where('isbn', '1234567890121')->doesntExist()) {
            Livro::create([
                'titulo' => 'Dom Casmurro',
                'genero' => 'Romance',
                'idioma' => 'Português',
                'isbn' => '1234567890121',
                'ano' => 1899,
                'autor_id' => 2
            ]);
        }

        if (Livro::where('isbn', '1234567890198')->doesntExist()) {
            Livro::create([
                'titulo' => 'O Filho de Mil Homens',
                'genero' => 'Romance',
                'idioma' => 'Português',
                'isbn' => '1234567890198',
                'ano' => 2011,
                'observacoes' => 'Obra de Valter Hugo Mãe.',
                'autor_id' => 5
            ]);
        }

        if (Livro::where('isbn', '1234567890125')->doesntExist()) {
            Livro::create([
                'titulo' => 'Ensaio Sobre a Cegueira',
                'genero' => 'Ficção',
                'idioma' => 'Português',
                'isbn' => '1234567890125',
                'ano' => 1995,
                'observacoes' => 'Obra-prima de José Saramago.',
                'autor_id' => 6
            ]);
        }

        if (Livro::where('isbn', '1234567890126')->doesntExist()) {
            Livro::create([
                'titulo' => 'Os Maias',
                'genero' => 'Clássico',
                'idioma' => 'Português',
                'isbn' => '1234567890126',
                'ano' => 1888,
                'observacoes' => 'Clássico da literatura portuguesa.',
                'autor_id' => 7
            ]);
        }

        if (Livro::where('isbn', '1234567890127')->doesntExist()) {
            Livro::create([
                'titulo' => 'A Hora da Estrela',
                'genero' => 'Romance',
                'idioma' => 'Português',
                'isbn' => '1234567890127',
                'ano' => 1977,
                'observacoes' => 'Última obra de Clarice Lispector.',
                'autor_id' => 8
            ]);
        }

        if (Livro::where('isbn', '1234567890130')->doesntExist()) {
            Livro::create([
                'titulo' => 'Harry Potter e a Pedra Filosofal',
                'genero' => 'Fantasia',
                'idioma' => 'Inglês',
                'isbn' => '1234567890130',
                'ano' => 1997,
                'observacoes' => 'Primeiro livro da série Harry Potter.',
                'autor_id' => 11
            ]);
        }

        if (Livro::where('isbn', '1234567890131')->doesntExist()) {
            Livro::create([
                'titulo' => 'A Vegetariana',
                'genero' => 'Romance',
                'idioma' => 'Coreano',
                'isbn' => '1234567890131',
                'ano' => 2007,
                'observacoes' => 'Vencedor do Man Booker International Prize.',
                'autor_id' => 12
            ]);
        }

        if (Livro::where('isbn', '1234567890132')->doesntExist()) {
            Livro::create([
                'titulo' => 'O Diário de Anne Frank',
                'genero' => 'Biografia',
                'idioma' => 'Alemão',
                'isbn' => '1234567890132',
                'ano' => 1947,
                'observacoes' => 'Diário escrito durante a Segunda Guerra Mundial.',
                'autor_id' => 13
            ]);
        }

        if (Livro::where('isbn', '1234567890133')->doesntExist()) {
            Livro::create([
                'titulo' => 'Guerra e Paz',
                'genero' => 'Clássico',
                'idioma' => 'Russo',
                'isbn' => '1234567890133',
                'ano' => 1869,
                'observacoes' => 'Uma das maiores obras da literatura mundial.',
                'autor_id' => 14
            ]);
        }

        if (Livro::where('isbn', '1234567890134')->doesntExist()) {
            Livro::create([
                'titulo' => 'Crime e Castigo',
                'genero' => 'Ficção',
                'idioma' => 'Russo',
                'isbn' => '1234567890134',
                'ano' => 1866,
                'observacoes' => 'Obra-prima de Dostoiévski.',
                'autor_id' => 15
            ]);
        }
    }
}