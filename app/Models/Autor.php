<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $table = 'autores';

    protected $fillable = [
        'nome',
        'apelido',
        'pais',
    ];
    
    public function livros()
{
    return $this->hasMany(Livro::class, 'autor_id');
}
}

