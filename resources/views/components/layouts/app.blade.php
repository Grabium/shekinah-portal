<!DOCTYPE html>
<!-- Layout carregado para qualquer elemento do Blade. Incluindo LiveWire e excluindo Brezee-->


<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('bootstrap-5.0.2-dist/css/bootstrap.min.css')}}">
        <title>{{ $title ?? 'Page Title Blade' }}</title>
    </head>
    <body>
        {{ $slot }}
        <script src="{{asset('bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js')}}"></script>
    </body>
</html>
