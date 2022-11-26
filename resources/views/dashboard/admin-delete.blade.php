@extends('layouts.maintemplate')

@section('title', 'Delete Movie')

@section('content')


    <div class="container">
        <h2 class="font-delete">Delete Movie : <strong class="font-delete-strong">{{ $movieDelete->judul }}</strong></h2>

        <form action="/dashboard-admin/destroy/{{ $movieDelete->id }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-outline-danger btn-delete-admin">Delete</button>
            <a href="/dashboard-admin" class="btn btn-warning">Back</a>
        </form>
        
        
        
    </div>

    
    
@endsection