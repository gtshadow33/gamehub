<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'juego_id',
        'user_id',
        'rating'
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