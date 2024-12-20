<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Autor;

class AutorController extends Controller
{
    public function index()
    {
    $autores = Autor::with('livros')->paginate(10); 

    return view('autores.index', compact('autores'));
    }

    
}
