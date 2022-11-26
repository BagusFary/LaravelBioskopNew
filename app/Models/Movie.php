<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $table = 'movies';
    protected $primaryKey = 'id';
    protected $fillable = ['judul', 'deskripsi', 'genre_id', 'image', 'tahun'];


    public function genres()
    {
        return $this->belongsTo(Genre::class, 'genre_id', 'id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'movie_tag', 'movie_id', 'tag_id');
    }

}
