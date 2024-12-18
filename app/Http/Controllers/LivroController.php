<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Livro;
use App\Models\Autor;


class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Livro::with('autor'); // Inclui a relação com autores

        // Adiciona filtros de pesquisa
        if ($request->filled('titulo')) {
            $query->where('titulo', 'like', '%' . $request->input('titulo') . '%');
        }
    
        if ($request->filled('autor')) {
            $query->whereHas('autor', function ($q) use ($request) {
                $q->where('nome', 'like', '%' . $request->input('autor') . '%')
                  ->orWhere('apelido', 'like', '%' . $request->input('autor') . '%');
            });
        }
    
        if ($request->filled('genero')) {
            $query->where('genero', 'like', '%' . $request->input('genero') . '%');
        }

            // Filtro de ordenação
    if ($request->filled('ordem')) {
        switch ($request->ordem) {
            case 'titulo':
                $query->orderBy('titulo', 'asc');
                break;
            case 'titulo_desc':
                $query->orderBy('titulo', 'desc');
                break;
            case 'ano':
                $query->orderBy('ano', 'asc');
                break;
            case 'ano_desc':
                $query->orderBy('ano', 'desc');
                break;
        }
    }
    
        // Paginação sem o método withQueryString
        $livros = $query->paginate(10);
    
        // Repassar os parâmetros da query string para a view manualmente
        return view('livros.index', compact('livros'))->with('filters', $request->all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $autores = Autor::all(); // Recupera todos os autores
        return view('livros.create', compact('autores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'titulo.required' => 'O título é obrigatório.',
            'genero.required' => 'O gênero é obrigatório.',
            'idioma.required' => 'O idioma é obrigatório.',
            'isbn.required' => 'O ISBN é obrigatório.',
            'isbn.unique' => 'O ISBN informado já está registrado.',
            'ano.required' => 'O ano de publicação é obrigatório.',
            'ano.integer' => 'O ano deve ser um número inteiro.',
            'ano.min' => 'O ano deve ser um número positivo.',
            'autor_id.required_without' => 'Selecione um autor existente ou insira um novo autor.',
            'novo_autor_nome.required_if' => 'O nome do novo autor é obrigatório.',
            'novo_autor_apelido.required_if' => 'O sobrenome do novo autor é obrigatório.',
            'capa.image' => 'A capa deve ser uma imagem válida.',
            'capa.mimes' => 'A capa deve estar em um dos formatos: jpeg, png, jpg ou gif.',
            'capa.max' => 'O tamanho máximo para a capa é de 2MB.',
        ];

        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'idioma' => 'required|string|max:255',
            'isbn' => 'required|string|unique:livros,isbn|max:13',
            'ano' => 'required|integer|digits:4',
            'observacoes' => 'nullable|string',
            'autor_id' => 'required_without:novo_autor_nome,novo_autor_apelido|exists:autores,id',
            'capa' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Verificar se é um autor existente ou um novo autor
        if ($request->input('autor_opcao') === 'novo') {
            // Validar os campos do novo autor
            $novoAutor = $request->validate([
                'novo_autor_nome' => 'required|string|max:255',
                'novo_autor_apelido' => 'nullable|string|max:255',
                'novo_autor_pais' => 'nullable|string|max:255',
            ]);
    
            // Criar o novo autor
            $autor = Autor::create([
                'nome' => $novoAutor['novo_autor_nome'],
                'apelido' => $novoAutor['novo_autor_apelido'],
                'pais' => $novoAutor['novo_autor_pais'],
            ]);
    
            $data['autor_id'] = $autor->id; // Associar o novo autor ao livro
        } else {
            // Validar se o autor existente foi selecionado
            $data['autor_id'] = $request->validate([
                'autor_id' => 'required|exists:autores,id',
            ])['autor_id'];
        }
    
        // Processar o upload da capa, se enviada
        if ($request->hasFile('capa')) {
            $data['capa'] = $request->file('capa')->store('capas', 'public');
        }
    
        // Criar o livro na base de dados
        Livro::create($data);
    
        return redirect()->route('livros.index')->with('success', 'Livro adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //$livro = Livro::findOrFail($id);  // Busca o livro específico
        $livro = Livro::with('autor')->findOrFail($id);
        return view('livros.show', compact('livro'));  // Passa o livro para a view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $livro = Livro::findOrFail($id); // Encontra o livro pelo ID
        $autores = Autor::all(); // Recupera todos os autores para o dropdown
        return view('livros.edit', compact('livro', 'autores')); // Retorna a view

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validação dos campos
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'idioma' => 'required|string|max:255',
            'isbn' => "required|string|max:13|unique:livros,isbn,{$id}", // ISBN deve ser único, ignorando o registro atual
            'ano' => 'required|integer|min:0',
            'observacoes' => 'nullable|string',
            'capa' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'autor_id' => 'required|exists:autores,id', // Autor deve existir
        ]);
    
        // Buscar o livro pelo ID ou retornar 404
        $livro = Livro::findOrFail($id);
    
        // Se uma nova capa for enviada, substitui a antiga
        if ($request->hasFile('capa')) {
            // Excluir a capa antiga, se existir
            if ($livro->capa && Storage::disk('public')->exists($livro->capa)) {
                Storage::disk('public')->delete($livro->capa);
            }
    
            // Armazenar a nova capa
            $data['capa'] = $request->file('capa')->store('capas', 'public');
        }
    
        // Atualizar o livro com os dados validados
        $livro->update($data);
    
        // Redirecionar com mensagem de sucesso
        return redirect()->route('livros.index')->with('success', 'Livro atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $livro = Livro::findOrFail($id); // Encontra o livro pelo ID
    
        // Remove a capa associada, se existir
        if ($livro->capa) {
            Storage::delete('public/' . $livro->capa);
        }
    
        $livro->delete(); // Remove o livro da base de dados
    
        return redirect()->route('livros.index')->with('success', 'Livro removido com sucesso!');
    }
    

    public function search(Request $request)
{
}

}
