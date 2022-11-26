@extends('layouts.maintemplate')

@section('title', 'Administrator')

@section('content')

        <div class="container">
                <div class="mt-1">
                    <h1 class="halaman-admin">Halaman Admin</h1>
                </div>
                
                @if(Session::has('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ Session::get('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>    
                    @endif 
                

                        <div class="container">
                            <div class="d-flex justify-content-end my-4">
                                <a href="/dashboard-admin-users" class="btn btn-success users-data-btn">Users Data</a>
                                <a href="/admin-create" class="btn btn-warning add-movie">Add Movie</a>   
                            </div>
                        </div>
                        
                        <form action="" method="get">
                            <div class="input-group searching">
                                <button class="btn btn-success bi bi-search" type="submit"></button>
                                <input type="text" class="form-control" name="keyword" placeholder="Search Here" >
                            </div>
                        </form>
                        

                        <div class="mb-5">
                            <table class="table table-dark table-striped table-bordered table-text">
                                <tr>
                                    <th>No.</th>
                                    <th>Judul</th>
                                    <th>Genre</th>
                                    <th>Aksi</th>
                                </tr>
                                <tr>
                                    @foreach($movieList as $movie)
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $movie->judul }}</td>
                                    <td>{{ $movie->genres->name }}</td>
                                    <td>
                                        <a href="/dashboard-admin/{{ $movie->id }}" class="btn btn-info tombol-aksi">Detail</a>
                                        <a href="/dashboard-admin/edit/{{ $movie->id }}" class="btn btn-warning tombol-aksi">Edit</a>
                                        <a href="/dashboard-admin/delete/{{ $movie->id }}" class="btn btn-danger tombol-aksi">Delete</a>
                                    </td>
                                </tr>
                                @endforeach

                            </table>
                        </div>

        </div>


                 
                        {{ $movieList->withQueryString()->links() }}
                    
                    
               

    
    
@endsection