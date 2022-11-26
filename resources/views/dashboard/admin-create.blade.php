@extends('layouts.maintemplate')

@section('title', 'Create Movie')

@section('content')


    <a href="/dashboard-admin" class="btn btn-danger mt-3">Back</a>

    <div class="container col-md-4 mt-1">

    @if ($errors->any())
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Limit</strong> 
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

        
        <div class="container d-flex justify-content-center halaman-add">
            <h3>Add Movie</h3>
        </div>


        <form action="/admin-store" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 form-font">
                <h5 for="judul">Judul</h5>
                <input type="text" class="form-control" name="judul" id="judul" required >
            </div>
            <div class="mb-3 form-font">
                <h5 for="deskripsi">Deskripsi</h5>
                <input type="text" class="form-control" name="deskripsi" id="deskripsi" required>
            </div>
            <div class="mb-3 form-font">
                <h5 for="tahun">Tahun</h5>
                <input type="date" class="form-control" name="tahun" id="tahun" required>
            </div>
            <div class="mb-3 form-font">
                <h5 for="genre_id">Genre</h5>
                <select name="genre_id" id="genre_id" class="form-control"  required>
                    <option value="">Select One</option>
                    @foreach ($genreList as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 form-font">
                <h5 for="gambar">Gambar</h5>
                <input type="file" class="form-control" name="gambar" id="gambar" required>
            </div>

            <div class="container">
                <button class="btn btn-warning add-movies" type="submit">Add Movie</button>
            </div>

        </form>
        

    </div>
    
@endsection