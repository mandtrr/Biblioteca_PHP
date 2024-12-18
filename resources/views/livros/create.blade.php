@extends('layouts.app')

@section('content')

    <div class="container mx-auto flex justify-center items-center min-h-screen">
        <div class="w-full max-w-3xl bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold text-center mb-6 text-gray-800">Adicionar Livro</h1>

            <!-- Formulário para Adicionar Livro -->
            <form action="{{ route('livros.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="titulo" class="block text-gray-700 font-bold">Título:</label>
                    <input type="text" name="titulo" id="titulo" class="w-full border rounded p-3 focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="mb-4">
                    <label for="autor_opcao" class="block text-gray-700 font-bold">Autor:</label>
                    <div>
                        <label class="block">
                            <input type="radio" name="autor_opcao" value="existente" checked>
                            Selecionar um autor existente
                        </label>
                        <select name="autor_id" id="autor_id" class="w-full border rounded p-3 mt-2 focus:ring-2 focus:ring-blue-500">
                            <option value="" disabled selected>Selecione um autor</option>
                            @foreach ($autores as $autor)
                                <option value="{{ $autor->id }}">{{ $autor->nome }} {{ $autor->apelido }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4">
                        <label class="block">
                            <input type="radio" name="autor_opcao" value="novo">
                            Adicionar um novo autor
                        </label>
                        <input type="text" name="novo_autor_nome" placeholder="Nome do Autor" class="w-full border rounded p-3 mt-2 focus:ring-2 focus:ring-blue-500">
                        <input type="text" name="novo_autor_apelido" placeholder="Apelido do Autor" class="w-full border rounded p-3 mt-2 focus:ring-2 focus:ring-blue-500">
                        <input type="text" name="novo_autor_pais" placeholder="País do Autor" class="w-full border rounded p-3 mt-2 focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>

                <div class="mb-4">
                    <label for="genero" class="block text-gray-700 font-bold">Gênero:</label>
                    <input type="text" name="genero" id="genero" class="w-full border rounded p-3 focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="mb-4">
                    <label for="idioma" class="block text-gray-700 font-bold">Idioma:</label>
                    <input type="text" name="idioma" id="idioma" class="w-full border rounded p-3 focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="mb-4">
                    <label for="isbn" class="block text-gray-700 font-bold">ISBN:</label>
                    <input type="text" name="isbn" id="isbn" class="w-full border rounded p-3 focus:ring-2 focus:ring-blue-500" maxlength="13" required>
                </div>

                <div class="mb-4">
                    <label for="ano" class="block text-gray-700 font-bold">Ano de Publicação:</label>
                    <input type="number" name="ano" id="ano" class="w-full border rounded p-3 focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="mb-4">
                    <label for="observacoes" class="block text-gray-700 font-bold">Observações:</label>
                    <textarea name="observacoes" id="observacoes" rows="3" class="w-full border rounded p-3 focus:ring-2 focus:ring-blue-500"></textarea>
                </div>

                <div class="mb-4">
                    <label for="capa" class="block text-gray-700 font-bold">Capa do Livro:</label>
                    <input type="file" name="capa" id="capa" class="w-full border p-3 focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Botão -->
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
                        Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
