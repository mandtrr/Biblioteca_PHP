@extends('layouts.app')

@section('content')

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-4">Editar Livro</h1>

        <form action="{{ route('livros.update', $livro->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-lg">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="titulo" class="block text-gray-700 font-bold">Título:</label>
                <input type="text" name="titulo" id="titulo" value="{{ $livro->titulo }}" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label for="genero" class="block text-gray-700 font-bold">Gênero:</label>
                <input type="text" name="genero" id="genero" value="{{ $livro->genero }}" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label for="idioma" class="block text-gray-700 font-bold">Idioma:</label>
                <input type="text" name="idioma" id="idioma" value="{{ $livro->idioma }}" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label for="isbn" class="block text-gray-700 font-bold">ISBN:</label>
                <input type="text" name="isbn" id="isbn" value="{{ $livro->isbn }}" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label for="ano" class="block text-gray-700 font-bold">Ano de Publicação:</label>
                <input type="number" name="ano" id="ano" value="{{ $livro->ano }}" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label for="observacoes" class="block text-gray-700 font-bold">Observações:</label>
                <textarea name="observacoes" id="observacoes" rows="3" class="w-full border rounded p-2">{{ $livro->observacoes }}</textarea>
            </div>

            <div class="mb-4">
                <label for="autor_id" class="block text-gray-700 font-bold">Autor:</label>
                <select name="autor_id" id="autor_id" class="w-full border rounded p-2" required>
                    @foreach ($autores as $autor)
                        <option value="{{ $autor->id }}" {{ $livro->autor_id == $autor->id ? 'selected' : '' }}>
                            {{ $autor->nome }} {{ $autor->apelido }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="capa" class="block text-gray-700 font-bold">Capa do Livro (opcional):</label>
                <input type="file" name="capa" id="capa" class="w-full border p-2">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Salvar Alterações</button>
        </form>
    </div>

@endsection
