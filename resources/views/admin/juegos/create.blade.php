@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-zinc-950 flex items-center justify-center px-6">

    <form method="POST" action="{{ route('juegos.store') }}"
          class="w-full max-w-lg bg-zinc-900 border border-zinc-800 p-8 rounded-2xl">

        @csrf

        <h1 class="text-2xl font-black text-white mb-6">➕ Crear juego</h1>

        <input name="titulo" placeholder="Título"
               class="w-full mb-4 px-4 py-3 bg-zinc-800 text-white rounded-xl">

        <textarea name="descripcion" placeholder="Descripción"
                  class="w-full mb-4 px-4 py-3 bg-zinc-800 text-white rounded-xl"></textarea>

        <input name="img" placeholder="Imagen URL"
               class="w-full mb-4 px-4 py-3 bg-zinc-800 text-white rounded-xl">

        <input name="link" placeholder="Link"
               class="w-full mb-4 px-4 py-3 bg-zinc-800 text-white rounded-xl">

        {{-- 🎮 GENEROS --}}
        <div class="mb-4 text-white">
            <p class="font-bold mb-2">Géneros</p>

            @foreach($generos as $genero)
                <label class="block">
                    <input type="checkbox" name="generos[]" value="{{ $genero->id }}">
                    {{ $genero->nombre }}
                </label>
            @endforeach
        </div>

        <button class="w-full bg-indigo-500 hover:bg-indigo-600 py-3 rounded-xl font-semibold">
            Guardar
        </button>

    </form>

</div>

@endsection