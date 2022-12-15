@extends('layouts.maintemplate')

@section('title', 'History Review')

@section('content')

<div class="container">

   

    <h2 class="history-review">History-Review</h2>

    @if(Session::has('comment-message'))
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            {{ Session::get('comment-message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>    
    @endif  

    <a href="/" class="btn btn-dark my-3 history-back">Back</a>
    <table class="table table-dark table-striped">
        <tr>
            <th>No.</th>
            <th>Movie</th>
            <th>Comment</th> 
            <th>Action</th>
        </tr>
        @foreach ($comment as $data)
        <tr>      
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->movie->judul }}</td>
            <td>{{ $data->text }}</td>
            <td>
                <a href="/comment-delete/{{ $data->id }}"><button class="btn btn-danger">Delete Comment</button></a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
    
@endsection