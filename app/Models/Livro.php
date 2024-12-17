<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $table = 'livros';
    
    public function autor()
{
    return $this->belongsTo(Autor::class, 'autor_id'); // A chave estrangeira 'autor_id'
}
}
