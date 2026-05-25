@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-zinc-950 flex items-center justify-center">

<form method="POST" action="{{ route('usuarios.update', $usuario) }}"
      class="bg-zinc-900 p-8 rounded w-96 text-white">

    @csrf
    @method('PUT')

    <h1 class="text-xl mb-4">Editar usuario</h1>

    <input name="name" value="{{ $usuario->name }}"
           class="w-full mb-3 p-2 bg-zinc-800">

    <input name="email" value="{{ $usuario->email }}"
           class="w-full mb-3 p-2 bg-zinc-800">

    <input name="password" type="password" placeholder="Nueva password"
           class="w-full mb-3 p-2 bg-zinc-800">

    <select name="role" class="w-full mb-3 p-2 bg-zinc-800">
        <option value="user" {{ $usuario->role == 'user' ? 'selected' : '' }}>User</option>
        <option value="admin" {{ $usuario->role == 'admin' ? 'selected' : '' }}>Admin</option>
    </select>

    <button class="bg-yellow-500 w-full py-2">
        Actualizar
    </button>

</form>

</div>

@endsection