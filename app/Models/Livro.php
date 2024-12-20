<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

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
    return $this->belongsTo(Autor::class, 'autor_id');
}
}
