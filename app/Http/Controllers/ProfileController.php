<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();

        $buscar = $request->buscar;

        $comentarios = Comentario::with('juego')
            ->where('user_id', $user->id)
            ->when($buscar, function ($query) use ($buscar) {
                $query->where('texto', 'like', "%{$buscar}%");
            })
            ->latest()
            ->get();

        return view('perfil.perfil', compact('user', 'comentarios', 'buscar'));
    }

    public function destroyComentario(Comentario $comentario)
    {
        if ($comentario->user_id !== auth()->id()) {
            abort(403);
        }

        $comentario->delete();

        return back()->with('success', 'Comentario eliminado');
    }
}