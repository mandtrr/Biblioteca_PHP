@extends('layouts.app')

@section('content')

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-4 text-center">Meus livros</h1>

        <!-- Formulário de Pesquisa -->
        <form action="{{ route('livros.index') }}" method="GET" class="mb-5">
            <div class="flex space-x-4">
                <input type="text" name="titulo" placeholder="Pesquisar por título" value="{{ request('titulo') }}" class="border rounded p-2 w-1/4">
                <input type="text" name="autor" placeholder="Pesquisar por autor" value="{{ request('autor') }}" class="border rounded p-2 w-1/4">
                <input type="text" name="genero" placeholder="Pesquisar por gênero" value="{{ request('genero') }}" class="border rounded p-2 w-1/4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Pesquisar</button>
            </div>
        </form>

        <!-- Tabela para exibir os livros -->
        <table class="min-w-full table-auto bg-white border-collapse rounded-lg shadow-lg">
            <thead>
                <tr class="bg-gray-800 text-white">
                    <th class="px-4 py-2 text-left">Título</th>
                    <th class="px-4 py-2 text-left">Autor</th>
                    <th class="px-4 py-2 text-left">Gênero</th>
                    <th class="px-4 py-2 text-left">Idioma</th>
                    <th class="px-4 py-2 text-left">Informações</th>
                    <th class="px-4 py-2 text-left">Editar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($livros as $livro)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="px-4 py-2">{{ $livro->titulo }}</td>
                        <td class="px-4 py-2">
                            @if ($livro->autor)
                                {{ $livro->autor->nome }} {{ $livro->autor->apelido }}
                            @else
                                <span class="text-gray-500">Autor não cadastrado</span>
                            @endif
                        </td>
                        <td class="px-4 py-2">{{ $livro->genero }}</td>
                        <td class="px-4 py-2">{{ $livro->idioma }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('livros.show', $livro->id) }}" class="text-blue-500 hover:text-blue-700">Ver mais</a>
                        </td>
                        <td class="px-4 py-2">
                <a href="{{ route('livros.edit', $livro->id) }}" class="text-blue-500 hover:text-blue-700">Editar</a>
            </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginação -->
        <div class="mt-4">
            {{ $livros->appends(request()->query())->links() }}
        </div>
    </div>
@endsection
