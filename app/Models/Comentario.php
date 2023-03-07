<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'imagen_id',
        'content'
    ];
    public function User() {
        return $this->belongsTo(User::class);
    }
    public function Imagen() {
        return $this->belongsTo(Imagen::class);
    }
}
