@extends('layouts.app')

@section('content')

<div class="container mx-auto p-6 flex justify-center items-center min-h-screen">
    <div class="w-full max-w-5xl bg-white p-6 rounded-lg shadow-lg">
        <h1 style="font-family: 'Mansalva'" class="text-center mb-8 text-gray-800 text-6xl">Autores</h1>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-md">
                <thead class="bg-gray-400 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-lg font-semibold uppercase">Autor(a)</th>
                        <th class="px-6 py-3 text-left text-lg font-semibold uppercase">País</th>
                        <th class="px-6 py-3 text-center text-lg font-semibold uppercase">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($autores as $autor)
                        <tr class="border-b hover:bg-gray-100">
                            <!-- Nome Completo -->
                            <td class="px-6 py-4 text-gray-700">
                                {{ $autor->nome }} {{ $autor->apelido }}
                            </td>

                            <!-- País -->
                            <td class="px-6 py-4 text-gray-700">
                                {{ $autor->pais ?? 'Não informado' }}
                            </td>

                            <!-- Botão Ver Livros -->
                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('livros.index', ['autor' => $autor->nome . ' ' . $autor->apelido]) }}"
                                   class="bg-gray-400 text-white px-6 py-3 rounded-lg hover:bg-gray-500 transition">
                                    Ver Livros
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Paginação -->
        <div class="mt-6 flex justify-end">
            {{ $autores->appends(request()->query())->links('pagination::tailwind') }}
        </div>
    </div>
</div>

@endsection
