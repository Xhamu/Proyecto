<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;

    protected $table = 'comentarios';
    protected $fillable = ['contenido', 'user_id', 'publicacion_id'];
}
