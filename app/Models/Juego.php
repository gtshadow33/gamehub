<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
    protected $fillable = [
        'titulo',
        'descripcion',
        'img',
        'link'
    ];

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function generos()
    {
        return $this->belongsToMany(Genero::class);
    }
}