<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Livro;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // Recupera todos os livros da tabela 'livros'
       $livros = Livro::with('autor')->get();  // 'autor' é a relação que você definiu no modelo Livro

       return view('livros.index', compact('livros'));
       
        $livros = Livro::with('autor')->get();
        return view('livros.index', compact('livros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $livro = Livro::findOrFail($id);
        return view('livros.show', compact('livro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
