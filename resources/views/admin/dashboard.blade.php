@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-12 px-6">

        <div class="mb-10">
            <h1 class="text-4xl font-bold text-white">
                Admin Dashboard
            </h1>

            <p class="text-zinc-400 mt-2">
                Bienvenido {{ auth()->user()->name }}
            </p>
        </div>

        {{-- Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-5 gap-6">

            <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6">
                <p class="text-zinc-400 text-sm mb-2">Usuarios</p>
                <h2 class="text-3xl font-bold text-white">{{ $users }}</h2>
            </div>

            <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6">
                <p class="text-zinc-400 text-sm mb-2">Administradores</p>
                <h2 class="text-3xl font-bold text-white">{{ $admins }}</h2>
            </div>

            <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6">
                <p class="text-zinc-400 text-sm mb-2">Juegos</p>
                <h2 class="text-3xl font-bold text-white">{{ $juegos }}</h2>
            </div>

            <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6">
                <p class="text-zinc-400 text-sm mb-2">Géneros</p>
                <h2 class="text-3xl font-bold text-white">{{ $generos }}</h2>
            </div>

            <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6">
                <p class="text-zinc-400 text-sm mb-2">Comentarios</p>
                <h2 class="text-3xl font-bold text-white">{{ $comentarios }}</h2>
            </div>

        </div>



    </div>
@endsection
