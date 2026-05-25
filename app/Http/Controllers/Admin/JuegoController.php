<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Juego;
use App\Models\Genero;
use Illuminate\Http\Request;

class JuegoController extends Controller
{
    public function index(Request $request)
    {
        $query = Juego::query();

        if ($request->filled('search')) {
            $query->where('titulo', 'like', '%' . $request->search . '%');
        }

      
        $juegos = $query->with('generos')->get();

        return view('admin.juegos.index', compact('juegos'));
    }

    public function create()
    {
        $generos = Genero::all();

        return view('admin.juegos.create', compact('generos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'nullable',
            'img' => 'nullable',
            'link' => 'nullable',
        ]);

        $juego = Juego::create($request->only([
            'titulo',
            'descripcion',
            'img',
            'link'
        ]));

        if ($request->has('generos')) {
            $juego->generos()->attach($request->generos);
        }

        return redirect()->route('juegos.index');
    }

    public function edit(Juego $juego)
    {
        $generos = Genero::all();

        return view('admin.juegos.edit', compact('juego', 'generos'));
    }

    public function update(Request $request, Juego $juego)
    {
        $juego->update($request->only([
            'titulo',
            'descripcion',
            'img',
            'link'
        ]));

        if ($request->has('generos')) {
            $juego->generos()->sync($request->generos);
        } else {
            $juego->generos()->detach();
        }

        return redirect()->route('juegos.index');
    }

    public function destroy(Juego $juego)
    {
        $juego->delete();

        return back();
    }
}