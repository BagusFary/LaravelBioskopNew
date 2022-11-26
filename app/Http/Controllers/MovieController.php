<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\MovieCreateRequest;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $movie = Movie::with(['tags','genres', 'comment.user'])
                        ->where('judul', 'LIKE', '%'.$keyword.'%')
                        ->orWhere('tahun', 'LIKE', '%'.$keyword.'%')
                        ->orWhereHas('genres', function($query) use($keyword){
                            $query->where('name', 'LIKE', '%'.$keyword.'%');
                        })
                        ->paginate(6);

        $tags = Tag::get();
        
        
        // count total genre film
        $horror = Movie::where('genre_id', 1)->get();
        $romance = Movie::where('genre_id', 2)->get();
        $comedy = Movie::where('genre_id', 3)->get();
        $action = Movie::where('genre_id', 4)->get();                    

        

                        
        return view('movies', ['movieList' => $movie,
                                'tags' => $tags,
                                 'horror' => $horror, 
                                 'comedy' => $comedy,
                                 'romance' => $romance,
                                 'action' => $action]);
    }

   
}
