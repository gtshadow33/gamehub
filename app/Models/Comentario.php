<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $fillable = [
        'user_id',
        'juego_id',
        'texto'
    ];

    public function juego()
    {
        return $this->belongsTo(Juego::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
