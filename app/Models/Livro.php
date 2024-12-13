<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    public function autor()
{
    return $this->belongsTo(Autor::class);
}
}
