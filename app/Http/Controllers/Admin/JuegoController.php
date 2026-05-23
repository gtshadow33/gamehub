<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Juego;
use Illuminate\Http\Request;

class JuegoController extends Controller
{
    public function index()
    {
        $juegos = Juego::all();
        return view('admin.juegos.index', compact('juegos'));
    }

    public function create()
    {
        return view('admin.juegos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'nullable',
            'img' => 'nullable',
            'link' => 'nullable',
        ]);

        Juego::create($request->all());

        return redirect()->route('juegos.index');
    }

    public function edit(Juego $juego)
    {
        return view('admin.juegos.edit', compact('juego'));
    }

    public function update(Request $request, Juego $juego)
    {
        $juego->update($request->all());

        return redirect()->route('juegos.index');
    }

    public function destroy(Juego $juego)
    {
        $juego->delete();

        return back();
    }
}