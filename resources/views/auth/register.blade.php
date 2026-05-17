@extends('layouts.app')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-zinc-950 px-6">

    <form method="POST" action="/register"
          class="w-full max-w-md bg-zinc-900 border border-zinc-800 p-8 rounded-2xl shadow-xl">

        @csrf

        <h2 class="text-3xl font-black text-white text-center mb-2">
            Crear cuenta
        </h2>

        <p class="text-center text-zinc-400 mb-8">
            Únete a GameHub
        </p>

        <!-- Name -->
        <input
            type="text"
            name="name"
            value="{{ old('name') }}"
            placeholder="Nombre"
            class="w-full mb-4 px-4 py-3 rounded-xl bg-zinc-800 border border-zinc-700 text-white placeholder-zinc-500 focus:ring-2 focus:ring-indigo-500 outline-none"
        >
        @error('name')
            <p class="text-red-400 text-sm mb-3">{{ $message }}</p>
        @enderror

        <!-- Email -->
        <input
            type="email"
            name="email"
            value="{{ old('email') }}"
            placeholder="Email"
            class="w-full mb-4 px-4 py-3 rounded-xl bg-zinc-800 border border-zinc-700 text-white placeholder-zinc-500 focus:ring-2 focus:ring-indigo-500 outline-none"
        >
        @error('email')
            <p class="text-red-400 text-sm mb-3">{{ $message }}</p>
        @enderror

        <!-- Password -->
        <input
            type="password"
            name="password"
            placeholder="Password"
            class="w-full mb-6 px-4 py-3 rounded-xl bg-zinc-800 border border-zinc-700 text-white placeholder-zinc-500 focus:ring-2 focus:ring-indigo-500 outline-none"
        >
        @error('password')
            <p class="text-red-400 text-sm mb-3">{{ $message }}</p>
        @enderror

        <!-- Button -->
        <button
            type="submit"
            class="w-full bg-indigo-500 hover:bg-indigo-600 text-white py-3 rounded-xl font-semibold transition"
        >
            Registrarse
        </button>

        <p class="text-center text-zinc-500 text-sm mt-6">
            ¿Ya tienes cuenta?
            <a href="/login" class="text-indigo-400 hover:text-indigo-300">
                Inicia sesión
            </a>
        </p>

    </form>

</div>

@endsection