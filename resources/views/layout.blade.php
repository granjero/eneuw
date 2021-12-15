<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/atom-one-light.min.css') }}">
    @yield('estilos')
</head>
<body>
    <div class="container-fluid my-5">
    @yield('contenido')
    </div>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/p5.min.js') }}"></script>
    <script src="{{ asset('assets/js/highlight.min.js') }}"></script>
    <script>hljs.highlightAll();</script>
</body>
</html>
