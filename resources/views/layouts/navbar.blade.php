<nav class="bg-zinc-900 border-b border-zinc-800 px-6 py-4 flex justify-between items-center text-white">

    {{-- LOGO --}}
    <a href="/" class="font-black text-xl">
        🎮 GameHub
    </a>

    {{-- LINKS --}}
    <div class="flex gap-4 items-center">

        <a href="/" class="hover:text-indigo-400">Inicio</a>

        

        {{--  SOLO ADMIN --}}
        @auth
            @if(auth()->user()->role === 'admin')

                <a href="{{ route('juegos.index') }}" class="hover:text-indigo-400">
                Juegos
                </a>

                <a href="{{ route('admin.dashboard') }}" class="hover:text-indigo-400">
                    Admin
                </a>

                <a href="{{ route('usuarios.index') }}" class="hover:text-indigo-400">
                    Usuarios
                </a>

                <a href="{{ route('admin.comentarios.index') }}" class="hover:text-indigo-400">
                    Comentarios
                </a>

            @endif
        @endauth

        {{-- LOGIN / LOGOUT --}}
        @auth
            <form method="POST" action="/logout">
                @csrf
                <button class="bg-red-500 px-3 py-1 rounded">
                    Logout
                </button>
            </form>
        @else
            <a href="/login" class="hover:text-indigo-400">Login</a>
        @endauth

    </div>

</nav>