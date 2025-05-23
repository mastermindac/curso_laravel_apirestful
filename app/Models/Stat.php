<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stat extends Model
{
    use HasFactory;

     protected $fillable = [
        'pts',
        'pts_three',
        'pts_two',
        'pts_one',
        'min',
        // agrega aquí todos los campos que aceptas
    ];

    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }
    
}
