<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MovieController extends Controller
{
    public function index(Request $request)
    {
                // New Query Eloquent
                $keyword = $request->keyword;
                $newmovie = Cache::remember('movie', 60, function() use($keyword){
                   return Movie::with(['comment:id,text,user_id,movie_id,rating,created_at', 'comment.user:id,name,role_id'])
                    ->select('id', 'judul', 'deskripsi', 'genre_id', 'image', 'tahun')
                    ->where('judul', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('tahun', 'LIKE', '%'.$keyword.'%')
                    ->orWhereHas('genres', function($query) use($keyword) {
                        $query->where('name', 'LIKE', '%'.$keyword.'%');
                    })
                    ->paginate(6);
                });
   

                 $newgenre= Cache::remember('genre', 60, function(){
                    return Genre::select('id', 'name')->withCount('movies')->get();
                 });
                        
        return view('movies', [ 'newmovie' => $newmovie,
                                'newgenre' => $newgenre
                            ]);
    }

    // public function Search(Request $request)
    // {
    //     $keyword = $request->keyword;

    //     $searchData = Movie::where('judul', 'LIKE', '%'.$keyword.'%' )
    //                         ->orWhere('tahun', 'LIKE', '%'.$keyword.'%')
    //                         ->orWhereHas('genres', function($query) use($keyword){
    //                             $query->where('name', 'LIKE', '%'.$keyword.'%');
    //                         })->paginate(6);

    //     return view('movies', ['']);
    // }

   
}

