@extends('layouts.app')

@section('content')

    <div class="container mx-auto p-6">

        <div class="flex justify-between items-center mb-6">
            <div><h1 style="font-family: 'Mansalva'" class="text-5xl text-center text-gray-700">Biblioteca da Amanda</h1></div> 
            
            <div class="flex gap-4 text-s">
                <!-- Formulário de Pesquisa -->
                <form action="{{ route('livros.index') }}" method="GET" class="flex gap-4">
                    <input type="text" name="titulo" placeholder="Pesquisar por título" value="{{ request('titulo') }}"
                           class="border border-gray-300 rounded-lg p-3 w-48 focus:ring-2 focus:ring-gray-400">
                    <input type="text" name="autor" placeholder="Pesquisar por autor" value="{{ request('autor') }}"
                           class="border border-gray-300 rounded-lg p-3 w-48 focus:ring-2 focus:ring-gray-400">
                    <input type="text" name="genero" placeholder="Pesquisar por gênero" value="{{ request('genero') }}"
                           class="border border-gray-300 rounded-lg p-3 w-48 focus:ring-2 focus:ring-gray-400">
                    <button type="submit"
                            class="bg-gray-400 text-white px-6 py-3 rounded-lg hover:bg-gray-500 transition">
                        Pesquisar
                    </button>
                </form>

                <!-- Filtro de Ordenação -->
                <form action="{{ route('livros.index') }}" method="GET" class="flex gap-4">
                    <select name="ordem" onchange="this.form.submit()" 
                            class="border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500">
                        <option value="" disabled {{ !request('ordem') ? 'selected' : '' }}>Ordenar por</option>
                        <option value="titulo" {{ request('ordem') === 'titulo' ? 'selected' : '' }}>Título (A-Z)</option>
                        <option value="titulo_desc" {{ request('ordem') === 'titulo_desc' ? 'selected' : '' }}>Título (Z-A)</option>
                        <option value="ano" {{ request('ordem') === 'ano' ? 'selected' : '' }}>Ano de Publicação (Crescente)</option>
                        <option value="ano_desc" {{ request('ordem') === 'ano_desc' ? 'selected' : '' }}>Ano de Publicação (Decrescente)</option>
                    </select>
                </form>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-md">
                <thead class="bg-gray-400 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-lg font-semibold uppercase">Título</th>
                        <th class="px-6 py-3 text-left text-lg font-semibold uppercase">Autor</th>
                        <th class="px-6 py-3 text-left text-lg font-semibold uppercase">Gênero</th>
                        <th class="px-6 py-3 text-left text-lg font-semibold uppercase">Idioma</th>
                        <th class="px-6 py-3 text-left text-lg font-semibold uppercase">Informações</th>
                        <th class="px-6 py-3 text-left text-lg font-semibold uppercase">Editar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($livros as $livro)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-6 py-4 text-gray-700">{{ $livro->titulo }}</td>
                            <td class="px-6 py-4 text-gray-700">
                                @if ($livro->autor)
                                    {{ $livro->autor->nome }} {{ $livro->autor->apelido }}
                                @else
                                    <span class="text-gray-500">Autor não cadastrado</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-gray-700">{{ $livro->genero }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $livro->idioma }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('livros.show', $livro->id) }}"
                                   class="text-gray-400 hover:text-gray-900 font-medium">
                                    Ver mais
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('livros.edit', $livro->id) }}"
                                   class="text-gray-400 hover:text-gray-900 font-medium">
                                    Editar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Paginação -->
        <div class="mt-6 flex justify-end">
            {{ $livros->appends(request()->query())->links('pagination::tailwind') }}
        </div>
    </div>

@endsection
