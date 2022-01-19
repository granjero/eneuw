<!-- Pieza Generativa. 2021. Planeta Tierra. JuanMiguel -->
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
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
