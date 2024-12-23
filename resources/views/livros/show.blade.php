@extends('layouts.app')

@section('content')

<div class="container mx-auto p-6 flex justify-center items-center min-h-screen">
    <div class="w-full max-w-4xl bg-white p-6 rounded-lg shadow-lg">
        <h1 style="font-family: 'Mansalva'" class="text-center mb-8 text-gray-800 text-6xl">{{ $livro->titulo }}</h1>

        <div class="flex flex-col md:flex-row items-center">
            <!-- Imagem do Livro -->
            <div class="flex-shrink-0">
                @if ($livro->capa)
                    <div class="w-[400px] h-[500px]">
                        <img src="{{ asset('storage/' . $livro->capa) }}" 
                             alt="Capa do Livro" 
                             class="w-full h-full object-contain">
                    </div>
                @else
                    <div class="w-[400px] h-[500px] bg-gray-200 flex items-center justify-center rounded-md shadow-md">
                        <span class="text-gray-500">Sem capa disponível</span>
                    </div>
                @endif
            </div>

            <div class="ml-0 md:ml-8 mt-6 md:mt-0 flex-grow text-gray-700 text-center">
                <p class="text-lg text-justify"><strong>Autor(a):</strong> 
                    @if ($livro->autor)
                        {{ $livro->autor->nome }} {{ $livro->autor->apelido }}
                    @else
                        <span class="text-gray-500">Autor não cadastrado</span>
                    @endif
                </p>
                <p class="text-lg text-justify"><strong>Gênero:</strong> {{ $livro->genero }}</p>
                <p class="text-lg text-justify"><strong>Idioma:</strong> {{ $livro->idioma }}</p>
                <p class="text-lg text-justify"><strong>ISBN:</strong> {{ $livro->isbn }}</p>
                <p class="text-lg text-justify"><strong>Ano de Publicação:</strong> {{ $livro->ano }}</p>
                <p class="text-lg text-justify"><strong>Sobre o livro:</strong> 
                    {{ $livro->historia ? $livro->historia : 'Sem história' }}
                </p>
            </div>
        </div>

        <!-- Botões -->
        <div class="flex justify-between mt-8">
            <a href="{{ route('livros.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">
                Voltar
            </a>
            @auth
            @if (Auth::user()->role === 'admin')
            <form action="{{ route('livros.destroy', $livro->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700"
                    onclick="return confirm('Tem certeza que deseja remover este livro?')">
                    Remover Livro
                </button>
            </form>
            @endif
            @endauth
        </div>

        <!-- Livros Relacionados -->
        <div class="mt-12 border-t-2 border-slate-50">
            <h2 style="font-family: 'Mansalva'" class="text-3xl text-center text-gray-700 mb-4 mt-8">Livros Relacionados</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($livrosRelacionados as $relacionado)
                    <div class="bg-white p-4 rounded-lg shadow-md">
                        @if ($relacionado->capa)
                            <img src="{{ asset('storage/' . $relacionado->capa) }}" 
                                 alt="Capa do Livro" 
                                 class="w-full h-56 object-contain rounded-md">
                        @else
                            <div class="w-full h-56 bg-gray-200 flex items-center justify-center rounded-md">
                                <span class="text-gray-500">Sem capa disponível</span>
                            </div>
                        @endif
                        <h3 class="text-lg font-semibold mt-4 text-center">{{ $relacionado->titulo }}</h3>
                        <p class="text-sm text-gray-600 text-center">Autor(a): 
                            @if ($relacionado->autor)
                            {{ $relacionado->autor->nome }} {{ $relacionado->autor->apelido }}
                            @else
                                Desconhecido
                            @endif
                        </p>
                        <div class="text-right mt-4">
                            <a href="{{ route('livros.show', $relacionado->id) }}" class="text-gray-500 hover:text-gray-700 text-sm">
                                Ver Detalhes </a>
                        </div>
                    </div>
                @empty
                <div>
                <p class="text-gray-500">Nenhum livro relacionado.</p>
                </div>
                @endforelse
            </div>
        </div>

    </div>
</div>

@endsection
