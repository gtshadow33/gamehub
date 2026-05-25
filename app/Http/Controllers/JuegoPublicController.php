<?php

namespace App\Http\Controllers;

use App\Models\Juego;
use App\Models\Comentario;
use App\Models\Rating;
use Illuminate\Http\Request;

class JuegoPublicController extends Controller
{
    // MOSTRAR JUEGO
    public function show(Juego $juego)
    {
        $juego->load([
            'comentarios.user',
            'ratings'
        ]);

        return view('juegos.show', compact('juego'));
    }

    // COMENTAR
    public function comentario(Request $request, Juego $juego)
    {
        $request->validate([
            'texto' => 'required|string|max:500',
        ]);

        Comentario::create([
            'user_id' => auth()->id(),
            'juego_id' => $juego->id,
            'texto' => $request->texto,
        ]);

        return back();
    }

    // RATING
    public function rating(Request $request, Juego $juego)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Rating::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'juego_id' => $juego->id,
            ],
            [
                'rating' => $request->rating,
            ]
        );

        return back();
    }

    // ELIMINAR COMENTARIO
    public function destroyComentario(Juego $juego, Comentario $comentario)
    {
        // Seguridad
        if ($comentario->user_id !== auth()->id()) {
            abort(403);
        }

        $comentario->delete();

        return back()->with('success', 'Comentario eliminado');
    }
}