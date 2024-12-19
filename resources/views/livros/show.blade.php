@extends('layouts.app')

@section('content')

    <div class="container mx-auto p-6 flex justify-center items-center min-h-screen">
        <div class="w-full max-w-4xl bg-white p-6 rounded-lg shadow-lg">
            <!-- Título Centralizado -->
            <h1 class="text-4xl font-bold text-center mb-8 text-gray-800">{{ $livro->titulo }}</h1>

            <!-- Conteúdo Dividido em Colunas -->
            <div class="flex flex-col md:flex-row items-center">
                <!-- Imagem do Livro -->
                <div class="flex-shrink-0">
                    @if ($livro->capa)
                        <div class="w-[400px] h-[500px]">
                            <img src="{{ asset('storage/' . $livro->capa) }}" 
                                 alt="Capa do Livro" 
                                 class="w-full h-full rounded-md shadow-md border border-gray-300 object-cover">
                        </div>
                    @else
                        <div class="w-[400px] h-[500px] bg-gray-200 flex items-center justify-center rounded-md shadow-md">
                            <span class="text-gray-500">Sem capa disponível</span>
                        </div>
                    @endif
                </div>

                <!-- Informações do Livro -->
                <div class="ml-0 md:ml-8 mt-6 md:mt-0 flex-grow text-gray-700 text-center">
                    <p class="text-lg text-justify"><strong>Autor:</strong> 
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
                <a href="{{ route('livros.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
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
                @else
                   
        @endif
        @endauth
            </div>
        </div>
    </div>

@endsection
