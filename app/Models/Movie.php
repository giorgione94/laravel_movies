<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'genre',
        'release_year',
        'rating_star',
        'image'
    ];
    public function casts() {
        return $this->belongsToMany(Cast::class)->withPivot('role');
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
