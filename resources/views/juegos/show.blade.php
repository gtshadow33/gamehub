@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto px-6 py-10">

        <!-- HEADER -->
        <div class="grid md:grid-cols-2 gap-8 mb-10">

            <!-- IMAGEN -->
            <div class="rounded-2xl overflow-hidden border border-zinc-800">
                <img src="{{ $juego->img }}" class="w-full h-full object-cover" alt="{{ $juego->titulo }}">
            </div>

            <!-- INFO -->
            <div>

                <h1 class="text-4xl font-black mb-3">
                    {{ $juego->titulo }}
                </h1>

                <!-- RATING -->
                <div class="flex items-center gap-2 text-yellow-400 mb-4">

                    @php
                        $avg = round($juego->ratings->avg('rating') ?? 0, 1);
                    @endphp

                    <span class="text-2xl font-bold">
                        {{ $avg }}
                    </span>

                    <span class="text-zinc-400">/ 5</span>

                </div>

                <!-- DESCRIPCIÓN -->
                <p class="text-zinc-400 mb-6 leading-relaxed">
                    {{ $juego->descripcion }}
                </p>

                <!-- DESCARGAR -->
                <a href="{{ $juego->link }}" target="_blank"
                    class="inline-block bg-indigo-500 hover:bg-indigo-600 px-6 py-3 rounded-xl font-semibold transition">

                    Descargar juego

                </a>

            </div>

        </div>

        <!-- DIVIDER -->
        <div class="border-t border-zinc-800 my-10"></div>

        <!-- INTERACCIONES -->
        <div class="grid md:grid-cols-2 gap-10">

            <!-- RATING -->
            <div>

                <h2 class="text-2xl font-bold mb-4">
                    Valorar juego
                </h2>

                @auth

                    <form method="POST" action="{{ route('juegos.rating', $juego) }}"
                        class="bg-zinc-900 p-4 rounded-xl border border-zinc-800">

                        @csrf

                        <label class="block text-sm text-zinc-400 mb-2">
                            Tu puntuación
                        </label>

                        <select name="rating" class="w-full bg-zinc-800 border border-zinc-700 p-3 rounded mb-4">

                            @for ($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}">

                                    {{ $i }}

                                    @for ($j = 1; $j <= $i; $j++)
                                        ⭐
                                    @endfor

                                </option>
                            @endfor

                        </select>

                        <button class="w-full bg-indigo-500 hover:bg-indigo-600 py-2 rounded-lg font-semibold">

                            Guardar rating

                        </button>

                    </form>
                @else
                    <p class="text-zinc-400">
                        Inicia sesión para valorar este juego.
                    </p>

                @endauth

            </div>

            <!-- COMENTARIOS -->
            <div>

                <h2 class="text-2xl font-bold mb-4">
                    Comentarios
                </h2>

                @auth

                    <form method="POST" action="{{ route('juegos.comentario', $juego) }}" class="mb-6">

                        @csrf

                        <textarea name="texto" rows="3" class="w-full bg-zinc-900 border border-zinc-800 p-3 rounded-xl mb-3"
                            placeholder="Escribe tu comentario..."></textarea>

                        <button class="bg-indigo-500 hover:bg-indigo-600 px-4 py-2 rounded-lg font-semibold">

                            Comentar

                        </button>

                    </form>
                @else
                    <p class="text-zinc-400 mb-4">
                        Inicia sesión para comentar.
                    </p>

                @endauth

                <!-- LISTA -->
                <div class="space-y-3">

                    @forelse($juego->comentarios as $comentario)
                        <div class="bg-zinc-900 border border-zinc-800 p-4 rounded-xl">

                            <div class="flex justify-between items-start mb-2">

                                <p class="text-sm text-zinc-400">
                                    {{ $comentario->user->name }}
                                </p>

                                @auth
                                    @if (auth()->id() === $comentario->user_id)
                                        <form method="POST"
                                            action="{{ route('juegos.comentario.destroy', [$juego, $comentario]) }}">

                                            @csrf
                                            @method('DELETE')

                                            <button onclick="return confirm('¿Eliminar comentario?')"
                                                class="text-red-400 hover:text-red-500 text-sm">

                                                Eliminar

                                            </button>

                                        </form>
                                    @endif
                                @endauth

                            </div>

                            <p class="text-zinc-200">
                                {{ $comentario->texto }}
                            </p>

                        </div>

                    @empty

                        <p class="text-zinc-500">
                            No hay comentarios todavía.
                        </p>
                    @endforelse

                </div>

            </div>

        </div>

    </div>
@endsection
