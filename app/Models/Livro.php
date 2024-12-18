<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $fillable = [
        'titulo',
        'genero',
        'idioma',
        'isbn',
        'ano',
        'historia',
        'capa',
        'autor_id',
    ];
    
    public function autor()
{
    return $this->belongsTo(Autor::class, 'autor_id'); // A chave estrangeira 'autor_id'
}
}
