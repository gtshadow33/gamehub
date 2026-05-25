@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-zinc-950 text-white p-10">

    <div class="flex justify-between mb-6">
        <h1 class="text-2xl font-bold">Usuarios</h1>

        <a href="{{ route('usuarios.create') }}"
           class="bg-indigo-500 px-4 py-2 rounded">
            Nuevo usuario
        </a>
    </div>

    <table class="w-full text-left">
        <thead>
            <tr class="border-b border-zinc-700">
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach($usuarios as $usuario)
                <tr class="border-b border-zinc-800">
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->role }}</td>

                    <td class="flex gap-2">
                        <a href="{{ route('usuarios.edit', $usuario) }}"
                           class="text-yellow-400">Editar</a>

                        <form method="POST" action="{{ route('usuarios.destroy', $usuario) }}">
                            @csrf
                            @method('DELETE')

                            <button class="text-red-500">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection