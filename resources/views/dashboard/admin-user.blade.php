@extends('layouts.maintemplate')

@section('title', 'Users Data')

@section('content')

    <div class="container">

       

        <h1 class="halaman-admin">Halaman Admin</h1>

        @if(Session::has('message'))
                <div class="alert alert-success alert-dismissible fade show " role="alert">
                    {{ Session::get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>    
        @endif 

        <a href="/dashboard-admin" class="btn btn-dark">Back</a>


        <table class="table table-dark table-striped mt-5 table-text">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            @foreach ($user as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <form action="" method="post">
                    @csrf
                    @method('delete')
                    <td><a href="/dashboard-admin/users/destroy/{{ $data->id }}" onclick="return confirm('Delete This User?')" class="btn btn-danger tombol-aksi">Delete</a></td>
                </form>
            </tr>
            @endforeach
        </table>

    </div>
    
@endsection