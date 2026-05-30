@extends('layouts.app')

@section('content')

    <!-- HERO -->
    <section class="max-w-7xl mx-auto px-6 py-16">

        <div class="max-w-3xl">

            <h1 class="text-5xl mt-8 font-black mb-4">
                Descubre los mejores juegos 🎮
            </h1>

            <p class="text-zinc-400 text-lg mb-8">
                Explora, valora y descarga juegos de la comunidad.
            </p>

            <!-- BUSCADOR -->
            <form method="GET" action="/" class="flex gap-3">

                <input type="text" name="buscar" value="{{ request('buscar') }}" placeholder="Buscar juego..."
                    class="w-full bg-zinc-900 border border-zinc-700 rounded-xl px-5 py-3 text-white focus:outline-none focus:border-indigo-500">

                <button class="bg-indigo-500 hover:bg-indigo-600 px-6 py-3 rounded-xl font-semibold transition">
                    Buscar
                </button>

            </form>

        </div>

    </section>

    <!-- JUEGOS -->
    <section class="max-w-7xl mx-auto px-6 pb-24">

        <h2 class="text-2xl font-bold p-8 mb-8">
            Juegos disponibles
        </h2>

        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">

            @forelse($juegos as $juego)
                @php
                    $rating = round($juego->averageRating() ?? 0);
                @endphp

                <!-- CARD CLICABLE -->
                <a href="{{ route('juegos.show', $juego) }}"
                    class="block bg-zinc-900 rounded-2xl overflow-hidden border border-zinc-800 hover:border-indigo-500 transition hover:-translate-y-1 duration-200">

                    <!-- IMG -->
                    <div class="h-52 overflow-hidden">
                        <img src="{{ $juego->img }}"
                            class="w-full h-full object-cover hover:scale-110 transition duration-300"
                            alt="{{ $juego->titulo }}">
                    </div>

                    <div class="p-5">

                        <!-- TITULO -->
                        <h3 class="text-xl font-bold mb-2 hover:text-indigo-400 transition">
                            {{ $juego->titulo }}
                        </h3>

                        <!-- RATING -->
                        <div class="flex items-center gap-2 mb-3 text-yellow-400 text-sm">

                            @if ($rating > 0)
                                @for ($i = 1; $i <= $rating; $i++)
                                    ⭐
                                @endfor
                            @else
                                <span class="text-zinc-500">Sin valoraciones</span>
                            @endif

                            <span class="text-zinc-400 ml-2">
                                {{ $rating }}/5
                            </span>

                        </div>

                        <!-- DESCRIPCION -->
                        <p class="text-zinc-400 text-sm mb-4">
                            {{ \Illuminate\Support\Str::limit($juego->descripcion, 90) }}
                        </p>

                        <!-- BOTON -->
                        <div class="bg-indigo-500 hover:bg-indigo-600 py-2 rounded-xl font-semibold text-center transition">
                            Ver juego
                        </div>

                    </div>

                </a>

            @empty

                <p class="text-zinc-400">
                    No hay juegos disponibles.
                </p>
            @endforelse

        </div>

    </section>

@endsection
