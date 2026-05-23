@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-zinc-950 flex items-center justify-center px-6">

    <form method="POST" action="{{ route('juegos.update', $juego) }}"
          class="w-full max-w-lg bg-zinc-900 border border-zinc-800 p-8 rounded-2xl">

        @csrf
        @method('PUT')

        <h1 class="text-2xl font-black text-white mb-6">✏️ Editar juego</h1>

        <input name="titulo"
               value="{{ $juego->titulo }}"
               class="w-full mb-4 px-4 py-3 bg-zinc-800 rounded-xl text-white">

        <textarea name="descripcion"
                  class="w-full mb-4 px-4 py-3 bg-zinc-800 rounded-xl text-white">{{ $juego->descripcion }}</textarea>

        <input name="img"
               value="{{ $juego->img }}"
               class="w-full mb-4 px-4 py-3 bg-zinc-800 rounded-xl text-white">

        <input name="link"
               value="{{ $juego->link }}"
               class="w-full mb-6 px-4 py-3 bg-zinc-800 rounded-xl text-white">

        <button class="w-full bg-yellow-500 hover:bg-yellow-600 py-3 rounded-xl font-semibold text-black">
            Actualizar
        </button>

    </form>

</div>

@endsection