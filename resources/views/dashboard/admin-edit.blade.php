@extends('layouts.maintemplate')

@section('title', 'Edit Movie')

@section('content')

    <a href="/dashboard-admin" class="btn btn-danger mt-4">Back</a>

    <div class="container col-md-4">
        <h2 class="halaman-edit">Edit Movie</h2>

            <form action="/dashboard-admin/update/{{ $movieEdit->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 form-font">
                        <h5 for="judul">Judul</h5>
                        <input type="text" class="form-control" name="judul" id="judul" value="{{ $movieEdit->judul }}" >
                    </div>
                    <div class="mb-3 form-font">
                        <h5 for="tahun">Tahun</h5>
                        <input type="date" class="form-control" name="tahun" id="tahun" value="{{ $movieEdit->tahun }}" >
                    </div>
                    <div class="mb-3 form-font">
                        <h5 for="genre">Genre</h5>
                        <select name="genre_id" id="genre" class="form-control" >
                            <option value="{{ $movieEdit->genres->id }}">{{ $movieEdit->genres->name }}</option>

                            @foreach ($movieGenre as $data)
                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                            @endforeach
                            
                        </select>
                    </div>
                    <div class="mb-3 form-font">
                        <h5 for="gambar">Gambar</h5>
                        <img src="{{ asset('/storage/gambar/'. $movieEdit->image) }}" style="width: 15rem;" class="mb-2">
                        <input type="file" class="form-control" name="gambar" id="gambar">
                    </div>
                    <div class="mb-3 form-font">
                        <h5 for="deskripsi">Deskripsi</h5>
                        <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="{{ $movieEdit->deskripsi }}" >
                    </div>

                    <div class="mb-5">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
            </form>
       

    </div>
    
@endsection