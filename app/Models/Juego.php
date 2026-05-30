<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Juego extends Model
{
    use HasFactory;

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
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function averageRating()
    {
        return $this->ratings()->avg('rating');
    }
}

