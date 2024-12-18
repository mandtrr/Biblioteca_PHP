@extends('layouts.app')

@section('content')

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-4">Adicionar Livro</h1>

        <!-- Formulário para Adicionar Livro -->
        <form action="{{ route('livros.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-lg">
            @csrf

            <div class="mb-4">
                <label for="titulo" class="block text-gray-700 font-bold">Título:</label>
                <input type="text" name="titulo" id="titulo" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
    <label for="autor_opcao" class="block text-gray-700 font-bold">Autor:</label>
    <div>
        <label>
            <input type="radio" name="autor_opcao" value="existente" checked>
            Selecionar um autor existente
        </label>
        <select name="autor_id" id="autor_id" class="w-full border rounded p-2">
            <option value="" disabled selected>Selecione um autor</option>
            @foreach ($autores as $autor)
                <option value="{{ $autor->id }}">{{ $autor->nome }} {{ $autor->apelido }}</option>
            @endforeach
        </select>
    </div>

    <div class="mt-2">
        <label>
            <input type="radio" name="autor_opcao" value="novo">
            Adicionar um novo autor
        </label>
        <input type="text" name="novo_autor_nome" placeholder="Nome do Autor" class="w-full border rounded p-2 mt-2">
        <input type="text" name="novo_autor_apelido" placeholder="Apelido do Autor" class="w-full border rounded p-2 mt-2">
        <input type="text" name="novo_autor_pais" placeholder="País do Autor" class="w-full border rounded p-2 mt-2">
    </div>
</div>

            

            <div class="mb-4">
                <label for="genero" class="block text-gray-700 font-bold">Gênero:</label>
                <input type="text" name="genero" id="genero" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label for="idioma" class="block text-gray-700 font-bold">Idioma:</label>
                <input type="text" name="idioma" id="idioma" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label for="isbn" class="block text-gray-700 font-bold">ISBN:</label>
                <input type="text" name="isbn" id="isbn" class="w-full border rounded p-2" maxlength="13" required>
            </div>

            <div class="mb-4">
                <label for="ano" class="block text-gray-700 font-bold">Ano de Publicação:</label>
                <input type="number" name="ano" id="ano" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label for="observacoes" class="block text-gray-700 font-bold">Observações:</label>
                <textarea name="observacoes" id="observacoes" rows="3" class="w-full border rounded p-2"></textarea>
            </div>

            <div class="mb-4">
                <label for="capa" class="block text-gray-700 font-bold">Capa do Livro:</label>
                <input type="file" name="capa" id="capa" class="w-full border p-2">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Salvar</button>
        </form>
    </div>

@endsection
