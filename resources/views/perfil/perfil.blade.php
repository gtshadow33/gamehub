@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto py-20 px-6">

        <h1 class="text-4xl font-bold mb-8">
            Mi Perfil
        </h1>

        <!-- INFO -->
        <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6 mb-10">

            <p class="text-zinc-300 mb-3">
                <span class="text-zinc-500">Nombre:</span>
                {{ $user->name }}
            </p>

            <p class="text-zinc-300 mb-3">
                <span class="text-zinc-500">Email:</span>
                {{ $user->email }}
            </p>

            <p class="text-zinc-300">
                <span class="text-zinc-500">ID:</span>
                {{ $user->id }}
            </p>

        </div>

        <!-- BUSCADOR -->
        <div class="mb-6">

            <form method="GET" action="{{ url('/perfil') }}">

                <input type="text" name="buscar" value="{{ $buscar }}" placeholder="Buscar comentarios..."
                    class="w-full bg-zinc-900 border border-zinc-800 rounded-xl p-4 text-white">

            </form>

        </div>

        <!-- COMENTARIOS -->
        <div>

            <h2 class="text-3xl font-bold mb-6">
                Mis Comentarios
            </h2>

            <div class="space-y-4">

                @forelse($comentarios as $comentario)
                    <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-5">

                        <div class="flex justify-between items-start mb-3">

                            <div>

                                <p class="text-indigo-400 font-semibold">
                                    {{ $comentario->juego->titulo }}
                                </p>

                                <p class="text-zinc-500 text-sm">
                                    {{ $comentario->created_at->diffForHumans() }}
                                </p>

                            </div>

                            <form method="POST" action="{{ route('perfil.comentario.destroy', $comentario) }}">

                                @csrf
                                @method('DELETE')

                                <button onclick="return confirm('¿Eliminar comentario?')"
                                    class="text-red-400 hover:text-red-500">
                                    Eliminar
                                </button>

                            </form>

                        </div>

                        <p class="text-zinc-200">
                            {{ $comentario->texto }}
                        </p>

                    </div>

                @empty

                    <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6">

                        <p class="text-zinc-500">
                            No tienes comentarios todavía.
                        </p>

                    </div>
                @endforelse

            </div>

        </div>

    </div>
@endsection
