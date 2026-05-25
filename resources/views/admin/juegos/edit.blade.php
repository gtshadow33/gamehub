@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-zinc-950 flex items-center justify-center px-6">

    <form method="POST" action="{{ route('juegos.update', $juego) }}"
          class="w-full max-w-lg bg-zinc-900 border border-zinc-800 p-8 rounded-2xl">

        @csrf
        @method('PUT')

        <h1 class="text-2xl font-black text-white mb-6">✏️ Editar juego</h1>

        <input name="titulo" value="{{ $juego->titulo }}"
               class="w-full mb-4 px-4 py-3 bg-zinc-800 text-white rounded-xl">

        <textarea name="descripcion"
                  class="w-full mb-4 px-4 py-3 bg-zinc-800 text-white rounded-xl">{{ $juego->descripcion }}</textarea>

        <input name="img" value="{{ $juego->img }}"
               class="w-full mb-4 px-4 py-3 bg-zinc-800 text-white rounded-xl">

        <input name="link" value="{{ $juego->link }}"
               class="w-full mb-4 px-4 py-3 bg-zinc-800 text-white rounded-xl">

        {{-- 🎮 GENEROS --}}
        <div class="mb-4 text-white">
            <p class="font-bold mb-2">Géneros</p>

            @foreach($generos as $genero)
                <label class="block">
                    <input type="checkbox"
                           name="generos[]"
                           value="{{ $genero->id }}"
                           {{ $juego->generos->contains($genero->id) ? 'checked' : '' }}>
                    {{ $genero->nombre }}
                </label>
            @endforeach
        </div>

        <button class="w-full bg-yellow-500 hover:bg-yellow-600 py-3 rounded-xl font-semibold text-black">
            Actualizar
        </button>

    </form>

</div>

@endsection