<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $table = 'likes';
    protected $fillable = ['user_id', 'publicacion_id'];

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function getNumeroLikesAttribute()
    {
        return $this->likes()->count();
    }
}
