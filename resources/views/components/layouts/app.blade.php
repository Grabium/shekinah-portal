<!DOCTYPE html>
<!-- Layout carregado para qualquer elemento do Blade. Incluindo LiveWire e excluindo Brezee-->


<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? 'Page Title Blade' }}</title>
        <!-- Scripts -->
        @vite('resources/js/app.js') <!-- carrega o js para o Alpine que é fundamental para o Livewire. -->
        @vite('resources/css/app-bootstrap.css') 
    </head>
    <body>
        {{ $slot }}
    </body>
</html>
