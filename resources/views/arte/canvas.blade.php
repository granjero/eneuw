<!-- Pieza Generativa. 2021. Planeta Tierra. JuanMiguel -->
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('titulo') -jm-</title>
        <style>
            body {
                overflow: hidden;
                margin: 0;
                display: flex;
                justify-content: center;
                align-items: center;
            }
        </style>
        <script src="{{ asset('assets/js/p5.min.js') }}"></script>
        @yield('arte')
    </head>
    <body>
        <main> </main>
    </body>
</html>
