@extends('layouts.maintemplate')

@section('title', 'History Review')

@section('content')

<div class="container">
    <h2 class="history-review">History-Review</h2>
    <a href="/" class="btn btn-dark my-3 history-back">Back</a>
    <table class="table table-dark table-striped">
        <tr>
            <th>No.</th>
            <th>Movie</th>
            <th>Comment</th> 
        </tr>
        @foreach ($comment as $data)
        <tr>      
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->movie->judul }}</td>
            <td>{{ $data->text }}</td>
        </tr>
        @endforeach
    </table>
</div>
    
@endsection