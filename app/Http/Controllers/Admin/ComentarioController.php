<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function index(Request $request)
    {
        $buscar = $request->buscar;

        $comentarios = Comentario::with(['user', 'juego'])

            ->when($buscar, function ($query, $buscar) {

                $query->where('texto', 'like', "%{$buscar}%")

                    ->orWhereHas('user', function ($q) use ($buscar) {
                        $q->where('name', 'like', "%{$buscar}%");
                    })

                    ->orWhereHas('juego', function ($q) use ($buscar) {
                        $q->where('titulo', 'like', "%{$buscar}%");
                    });

            })

            ->latest()
            ->get();

        return view('admin.comentarios.index', compact('comentarios'));
    }

    public function destroy(Comentario $comentario)
    {
        $comentario->delete();

        return back();
    }
}