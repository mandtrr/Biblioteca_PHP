@extends('layouts.app')

@section('content')

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-4">Lista de Livros</h1>
        <form action="{{ route('livros.search') }}" method="GET" class="mb-5">
        <input type="text" name="titulo" placeholder="Pesquisar por título" value="{{ request('titulo') }}">
        <input type="text" name="autor" placeholder="Pesquisar por autor" value="{{ request('autor') }}">
        <input type="text" name="genero" placeholder="Pesquisar por gênero" value="{{ request('genero') }}">
        <button type="submit">Pesquisar</button>
        </form>

        <!-- Tabela para exibir os livros -->
        <table class="min-w-full table-auto bg-white border-collapse rounded-lg shadow-lg">
            <thead>
                <tr class="bg-gray-800 text-white">
                    <th class="px-4 py-2 text-left">Título</th>
                    <th class="px-4 py-2 text-left">Autor</th>
                    <th class="px-4 py-2 text-left">Gênero</th>
                    <th class="px-4 py-2 text-left">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($livros as $livro)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="px-4 py-2">{{ $livro->titulo }}</td>
                        <td>{{ $livro->autor->nome }} {{ $livro->autor->apelido }}</td>                   
                        <td class="px-4 py-2">{{ $livro->genero }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('livros.show', $livro->id) }}" class="text-blue-500 hover:text-blue-700">Ver</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
