<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameHub</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'], 'build')
</head>

<body class="bg-zinc-950 text-white">

    {{-- NAVBAR GLOBAL --}}
    @include('layouts.navbar')

    {{-- CONTENIDO --}}
    <main>
        @yield('content')
    </main>

</body>

</html>
