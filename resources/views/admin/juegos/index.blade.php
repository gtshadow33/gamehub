@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-zinc-950 text-white px-8 py-10">

    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-black">🎮 Juegos</h1>

        <form method="GET" action="{{ route('juegos.index') }}" class="flex gap-2">
            <input type="text"
                   name="search"
                   value="{{ request('search') }}"
                   placeholder="Buscar juegos..."
                   class="px-4 py-2 rounded-xl bg-zinc-800 text-white border border-zinc-700">

            <button class="bg-indigo-500 px-4 py-2 rounded-xl font-semibold">
                Buscar
            </button>
        </form>

        <a href="{{ route('juegos.create') }}"
           class="bg-indigo-500 hover:bg-indigo-600 px-5 py-2 rounded-xl font-semibold">
            + Nuevo juego
        </a>
    </div>

    <div class="grid md:grid-cols-3 gap-6">

        @foreach($juegos as $juego)
            <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-5 shadow">

                <img src="{{ $juego->img }}"
                     class="rounded-xl mb-4 h-40 w-full object-cover">

                <h2 class="text-xl font-bold">
                    {{ $juego->titulo }}
                </h2>

                <p class="text-zinc-400 text-sm mt-2">
                    {{ $juego->descripcion }}
                </p>

                {{-- 🎮 GÉNEROS --}}
                <div class="mt-3 flex flex-wrap gap-2">
                    @foreach($juego->generos as $genero)
                        <span class="bg-indigo-600 text-xs px-2 py-1 rounded-lg">
                            {{ $genero->nombre }}
                        </span>
                    @endforeach
                </div>

                <div class="flex gap-2 mt-4">

                    <a href="{{ route('juegos.edit', $juego) }}"
                       class="bg-yellow-500 hover:bg-yellow-600 px-4 py-2 rounded-lg text-black font-semibold">
                        Editar
                    </a>

                    <form method="POST" action="{{ route('juegos.destroy', $juego) }}">
                        @csrf
                        @method('DELETE')

                        <button class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg font-semibold">
                            Borrar
                        </button>
                    </form>

                </div>

            </div>
        @endforeach

    </div>

</div>

@endsection