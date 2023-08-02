<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\MovieCreateRequest;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $movie = Movie::with('genres')
                        ->where('judul', 'LIKE', '%'.$keyword.'%')
                        ->orWhereHas('genres', function($query) use($keyword){
                            $query->where('name', 'LIKE', '%'.$keyword.'%');
                        })
                        ->paginate(5);
        return view('dashboard.admin', ['movieList' => $movie]);
    }

    public function show($id)
    {
        $movie = Movie::with('genres')->findOrFail($id);
        return view('dashboard.admin-detail', ['movieDetail' => $movie]);
    }

    public function create()
    {
        $genre = Genre::get();
        return view('dashboard.admin-create', ['genreList' => $genre]);
    }

    public function store(MovieCreateRequest $request)
    {   
        $gambar = '';

        if($request->file('gambar')){
            $gambar = $request->file('gambar')->store('gambar');
        }
         

         $request['image'] = basename($gambar);
         $movie = Movie::create($request->all());

         if($movie){
            Session::flash('message', 'Add Movie Success');
         }

        
        
         return redirect('/dashboard-admin');

    }

    public function edit($id)
    {
        $movie = Movie::with('genres')->findOrFail($id);
        $genre = Genre::where('id', '!=' ,$movie->genre_id)->select('id', 'name')->get();
        return view('dashboard.admin-edit', ['movieEdit' => $movie, 'movieGenre' => $genre]);
    }

    public function update(Request $request, $id)
    {

        if($request->file('gambar')){
            $newGambar = $request->file('gambar')->store('gambar');
            $request['image'] = basename($newGambar);
            $gambar = Movie::findOrFail($id);
            Storage::delete('gambar/' .$gambar->image);
        }
         

        $movie = Movie::findOrFail($id);
        $movie->update($request->all());
        if($movie){
            Session::flash('message', 'Update Movie Success');
        }

        return redirect('/dashboard-admin');
    }

    public function delete($id)
    {
        $movie = Movie::findOrFail($id);
        return view('dashboard.admin-delete', ['movieDelete' => $movie]);
    }

    public function destroy($id) 
    {
        $movieDelete = Movie::findOrFail($id);
        Storage::delete('gambar/' .$movieDelete->image);
        $movieDelete->delete();

        if($movieDelete){
            Session::flash('message', 'Delete Movie Success');
        }
        
        return redirect('dashboard-admin');
    }



}
