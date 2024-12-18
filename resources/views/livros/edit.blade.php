@extends('layouts.app')

@section('content')

    <div class="container mx-auto flex justify-center items-center min-h-screen">
        <div class="w-full max-w-3xl bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold text-center mb-6 text-gray-800">Editar Livro</h1>

            <form action="{{ route('livros.update', $livro->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="titulo" class="block text-gray-700 font-bold">Título:</label>
                    <input type="text" name="titulo" id="titulo" value="{{ $livro->titulo }}" 
                           class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="mb-4">
                    <label for="genero" class="block text-gray-700 font-bold">Gênero:</label>
                    <input type="text" name="genero" id="genero" value="{{ $livro->genero }}" 
                           class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="mb-4">
                    <label for="idioma" class="block text-gray-700 font-bold">Idioma:</label>
                    <input type="text" name="idioma" id="idioma" value="{{ $livro->idioma }}" 
                           class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="mb-4">
                    <label for="isbn" class="block text-gray-700 font-bold">ISBN:</label>
                    <input type="text" name="isbn" id="isbn" value="{{ $livro->isbn }}" 
                           class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="mb-4">
                    <label for="ano" class="block text-gray-700 font-bold">Ano de Publicação:</label>
                    <input type="number" name="ano" id="ano" value="{{ $livro->ano }}" 
                           class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="mb-4">
                    <label for="observacoes" class="block text-gray-700 font-bold">Observações:</label>
                    <textarea name="observacoes" id="observacoes" rows="3" 
                              class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500">{{ $livro->observacoes }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="autor_id" class="block text-gray-700 font-bold">Autor:</label>
                    <select name="autor_id" id="autor_id" 
                            class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500" required>
                        @foreach ($autores as $autor)
                            <option value="{{ $autor->id }}" {{ $livro->autor_id == $autor->id ? 'selected' : '' }}>
                                {{ $autor->nome }} {{ $autor->apelido }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="capa" class="block text-gray-700 font-bold">Capa do Livro (opcional):</label>
                    <input type="file" name="capa" id="capa" 
                           class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Botões -->
                <div class="flex justify-between mt-6">
                    <a href="{{ route('livros.index') }}" 
                       class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition">
                        Voltar
                    </a>
                    <button type="submit" 
                            class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
                        Salvar Alterações
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
