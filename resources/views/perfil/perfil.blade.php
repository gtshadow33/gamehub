@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto py-20 px-6">

    <h1 class="text-4xl font-bold mb-8">
        Mi Perfil
    </h1>

    <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6">

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

</div>

@endsection