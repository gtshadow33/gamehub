@extends('layouts.app')

@section('content')

<!-- NAVBAR -->
<nav class="bg-zinc-900 border-b border-zinc-800">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

        <a href="/" class="text-2xl font-bold text-indigo-500">
            GameHub
        </a>

        <div class="flex items-center gap-4">

            @auth

                <span class="text-zinc-300">
                    Hola, {{ auth()->user()->name }}
                </span>

                <a href="/perfil"
                   class="bg-indigo-500 hover:bg-indigo-600 px-4 py-2 rounded-lg transition">
                    Perfil
                </a>

                <form action="/logout" method="POST">
                    @csrf

                    <button class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg transition">
                        Logout
                    </button>
                </form>

            @else

                <a href="/login"
                   class="bg-indigo-500 hover:bg-indigo-600 px-4 py-2 rounded-lg transition">
                    Login
                </a>

                <a href="/register"
                   class="bg-zinc-700 hover:bg-zinc-600 px-4 py-2 rounded-lg transition">
                    Register
                </a>

            @endauth

        </div>
    </div>
</nav>

<!-- HERO -->
<section class="max-w-7xl mx-auto px-6 py-24">

    <div class="max-w-3xl">

        <h1 class="text-6xl font-black leading-tight mb-6">
            Descubre y descarga tus juegos favoritos
        </h1>

        <p class="text-zinc-400 text-xl mb-8">
            Explora una colección de videojuegos,
            deja comentarios y puntúa los mejores juegos.
        </p>

        <div class="flex gap-4">

            <a href="/games"
               class="bg-indigo-500 hover:bg-indigo-600 px-6 py-3 rounded-xl font-semibold transition">
                Ver Juegos
            </a>

            @guest
                <a href="/register"
                   class="bg-zinc-800 hover:bg-zinc-700 px-6 py-3 rounded-xl font-semibold transition">
                    Crear Cuenta
                </a>
            @endguest

        </div>

    </div>

</section>

<!-- FEATURES -->
<section class="max-w-7xl mx-auto px-6 pb-20">

    <div class="grid md:grid-cols-3 gap-6">

        <div class="bg-zinc-900 p-6 rounded-2xl border border-zinc-800">
            <h2 class="text-2xl font-bold mb-3">🎮 Juegos</h2>
            <p class="text-zinc-400">
                Explora un catálogo de videojuegos publicados por la comunidad.
            </p>
        </div>

        <div class="bg-zinc-900 p-6 rounded-2xl border border-zinc-800">
            <h2 class="text-2xl font-bold mb-3">⭐ Ratings</h2>
            <p class="text-zinc-400">
                Puntúa juegos y descubre cuáles son los mejor valorados.
            </p>
        </div>

        <div class="bg-zinc-900 p-6 rounded-2xl border border-zinc-800">
            <h2 class="text-2xl font-bold mb-3">💬 Comunidad</h2>
            <p class="text-zinc-400">
                Comenta juegos y comparte opiniones con otros usuarios.
            </p>
        </div>

    </div>

</section>

@endsection