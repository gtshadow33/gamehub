@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-zinc-950 flex items-center justify-center">

<form method="POST" action="{{ route('usuarios.store') }}"
      class="bg-zinc-900 p-8 rounded w-96 text-white">

    @csrf

    <h1 class="text-xl mb-4">Crear usuario</h1>

    <input name="name" placeholder="Nombre"
           class="w-full mb-3 p-2 bg-zinc-800">

    <input name="email" placeholder="Email"
           class="w-full mb-3 p-2 bg-zinc-800">

    <input name="password" type="password" placeholder="Password"
           class="w-full mb-3 p-2 bg-zinc-800">

    <select name="role" class="w-full mb-3 p-2 bg-zinc-800">
        <option value="user">User</option>
        <option value="admin">Admin</option>
    </select>

    <button class="bg-indigo-500 w-full py-2">
        Guardar
    </button>

</form>

</div>

@endsection