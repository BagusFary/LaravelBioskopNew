<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';

    
    public function movie()
    {
        return $this->belongsToMany(Movie::class, 'movie_tag', 'tag_id', 'movie_id');
    }
}
