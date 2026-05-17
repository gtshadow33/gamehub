@extends('layouts.app')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-zinc-950 px-6">

    <form method="POST" action="/login"
          class="w-full max-w-md bg-zinc-900 border border-zinc-800 p-8 rounded-2xl shadow-xl">

        @csrf

        <h2 class="text-3xl font-black text-white text-center mb-2">
            Iniciar sesión
        </h2>

        <p class="text-center text-zinc-400 mb-8">
            Bienvenido de vuelta a GameHub
        </p>

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
            Entrar
        </button>

        <p class="text-center text-zinc-500 text-sm mt-6">
            ¿No tienes cuenta?
            <a href="/register" class="text-indigo-400 hover:text-indigo-300">
                Regístrate
            </a>
        </p>

    </form>

</div>

@endsection