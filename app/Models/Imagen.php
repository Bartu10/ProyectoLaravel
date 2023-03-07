<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    use HasFactory;

    protected $fillable = [
        'imagen_path',
        'description',
        'user_id'
    ];

    public function users() { 
        return $this->belongsTo(User::class); 
    }
    public function likes() { 
        return $this->hasMany(Like::class); 
    }
    public function comentarios() { 
        return $this->hasMany(Comentario::class); 
    }

    public function numeroLikes() {
        return count($this->likes);
    }
    public function numeroComentarios() {
        return count($this->comentarios);
    }
}
