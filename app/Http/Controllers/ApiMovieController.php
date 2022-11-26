<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Http\Resources\MovieResource;
use App\Http\Resources\MovieDetailResource;

class ApiMovieController extends Controller
{

    public function index()
    {
        $result = Movie::with('genres')->paginate(5);
        return MovieResource::collection($result);
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $result = Movie::with('genres:id,name')->find($id);
        if (empty($result)) {
            return "This Movie ID has no data";
        }

        return new MovieDetailResource($result);

    }

 
    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
       if($request->input('judul')){
            
            $result = Movie::with('genres:id,name')->where('judul', 'like', '%'.$request->input('judul').'%')->get();

                if(!count($result)){

                    return "No Result";

                    } else 

                return MovieDetailResource::collection($result);

       }
        
       return "key or value not recognized";

    }
}
