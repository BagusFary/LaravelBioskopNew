@extends('layouts.maintemplate')

@section('title', 'Detail Film')

@section('content')

    <div class="container mt-3">
        <a href="/dashboard-admin" class="btn btn-danger">Back</a>
    </div>

    <div class="container mb-5">
        <h2 class="detail-film">Detail Film</h2>

       

        <div class="row g-0 bg-dark text-light position-relative detail-box">

            @if($movieDetail->genres->name == 'Horror')
            <span class="badge text-bg-secondary">{{ $movieDetail->genres->name }}</span>
    
            @elseif($movieDetail->genres->name == 'Comedy')
            <span class="badge text-bg-warning">{{ $movieDetail->genres->name }}</span>
    
            @elseif($movieDetail->genres->name == 'Romance')
            <span class="badge text-bg-danger">{{ $movieDetail->genres->name }}</span>
    
            @endif

            <div class="col-md-3 mb-md-0 p-md-4">
              <img src="{{ asset('/storage/gambar/'. $movieDetail->image) }}" class="w-100 image-height">
            </div>
            <div class="col-md-6 p-4 ps-md-0">
              <h5 class="mt-0 judul-movie">{{ $movieDetail->judul }}</h5>
              <strong>Rilis : {{ $movieDetail->tahun }}</strong>
              <div class="mt-2">
                <p class="deskripsi-detail">{{ $movieDetail->deskripsi }}</p>
              </div>
            </div>
          </div>

    </div>



@endsection