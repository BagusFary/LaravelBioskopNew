<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    protected $primaryKey = 'id';
    protected $fillable = ['text', 'user_id', 'movie_id', 'rating'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id', 'id');
    }
    
}
