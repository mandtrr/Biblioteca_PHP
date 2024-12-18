@extends('layouts.app')

@section('content')

    <div class="container mx-auto p-6 flex justify-center items-center min-h-screen">
        <div class="w-full max-w-4xl bg-white p-6 rounded-lg shadow-lg">
            <!-- Título Centralizado -->
            <h1 class="text-4xl font-bold text-center mb-8">{{ $livro->titulo }}</h1>

            <!-- Conteúdo Dividido em Colunas -->
            <div class="flex flex-col md:flex-row">
                <!-- Imagem do Livro -->
                <div class="flex-shrink-0">
                    @if ($livro->capa)
                        <div class="w-96 h-96">
                            <img src="{{ asset('storage/' . $livro->capa) }}" 
                                 alt="Capa do Livro" 
                                 class="w-full h-full rounded-md shadow-md border border-gray-300 object-cover">
                        </div>
                    @else
                        <div class="w-96 h-96 bg-gray-200 flex items-center justify-center rounded-md shadow-md">
                            <span class="text-gray-500">Sem capa disponível</span>
                        </div>
                    @endif
                </div>

                <!-- Informações do Livro -->
                <div class="ml-0 md:ml-8 mt-6 md:mt-0 flex-grow">
                    <p class="text-lg"><strong>Autor:</strong> 
                        @if ($livro->autor)
                            {{ $livro->autor->nome }} {{ $livro->autor->apelido }}
                        @else
                            <span class="text-gray-500">Autor não cadastrado</span>
                        @endif
                    </p>
                    <p class="text-lg"><strong>Gênero:</strong> {{ $livro->genero }}</p>
                    <p class="text-lg"><strong>Idioma:</strong> {{ $livro->idioma }}</p>
                    <p class="text-lg"><strong>ISBN:</strong> {{ $livro->isbn }}</p>
                    <p class="text-lg"><strong>Ano de Publicação:</strong> {{ $livro->ano }}</p>
                    <p class="text-lg"><strong>Observações:</strong> 
                        {{ $livro->observacoes ? $livro->observacoes : 'Sem observações' }}
                    </p>
                </div>
            </div>

            <!-- Botões -->
            <div class="flex justify-between mt-8">
                <a href="{{ route('livros.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700">
                    Voltar
                </a>
                <form action="{{ route('livros.destroy', $livro->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700"
                        onclick="return confirm('Tem certeza que deseja remover este livro?')">
                        Remover Livro
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection
