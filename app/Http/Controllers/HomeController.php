<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juego;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $buscar = $request->buscar;

        $juegos = Juego::with('ratings')
    ->when($buscar, function ($query, $buscar) {
        $query->where('titulo', 'like', '%' . $buscar . '%');
    })
    ->latest()
    ->get();

        return view('index', compact('juegos', 'buscar'));
    }
}