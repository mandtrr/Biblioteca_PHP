<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100 dark:bg-gray-900"> <!-- Adicionando fundo claro e escuro -->
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900"> <!-- Garantindo que o conteúdo ocupe toda a altura da tela -->
            @include('layouts.navigation') <!-- Incluindo a navegação -->

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="p-4 sm:p-6 lg:p-8 bg-white dark:bg-gray-800 rounded-lg shadow-md"> <!-- Melhorando o espaçamento do conteúdo e fundo -->
                @yield('content') <!-- Aqui será injetado o conteúdo das páginas -->
            </main>
        </div>
    </body>
</html>
