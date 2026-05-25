@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-zinc-950 text-white p-10">

        <h1 class="text-3xl font-black mb-6">💬 Comentarios</h1>

        <form method="GET" action="{{ route('admin.comentarios.index') }}" class="flex gap-3 mb-6">

            <input type="text" name="buscar" value="{{ request('buscar') }}" placeholder="Buscar coemtario..."
                class="w-full bg-zinc-900 border border-zinc-700 rounded-xl px-5 py-3 text-white focus:outline-none focus:border-indigo-500">

            <button class="bg-indigo-500 hover:bg-indigo-600 px-6 py-3 rounded-xl font-semibold transition">
                Buscar
            </button>

        </form>

        <div class="space-y-4">

            @foreach ($comentarios as $comentario)
                <div class="bg-zinc-900 border border-zinc-800 p-4 rounded-xl flex justify-between items-center">

                    <div>
                        <p class="text-white font-semibold">
                            {{ $comentario->user->name ?? 'Usuario' }}
                        </p>

                        <p class="text-zinc-300">
                            {{ $comentario->texto }}
                        </p>

                        <p class="text-xs text-zinc-500 mt-1">
                            🎮 Juego: {{ $comentario->juego->titulo ?? 'Sin juego' }}
                        </p>
                    </div>

                    <form method="POST" action="{{ route('admin.comentarios.destroy', $comentario) }}">
                        @csrf
                        @method('DELETE')

                        <button class="bg-red-500 hover:bg-red-600 px-3 py-2 rounded-lg">
                            Eliminar
                        </button>
                    </form>

                </div>
            @endforeach

        </div>

    </div>
@endsection
