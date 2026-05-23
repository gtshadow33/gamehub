<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Juego;
use App\Models\genero;
use App\Models\Comentario;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'users' => User::count(),
            'admins' => User::where('role', 'admin')->count(),
            'juegos' => Juego::count(),
            'generos' => Genero::count(),
            'comentarios' => Comentario::count(),
        ]);
    }
}