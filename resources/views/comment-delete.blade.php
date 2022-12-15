@extends('layouts.maintemplate')

@section('title', 'Delete My Comment')

@section('content')

    <div class="container">
        
        
        @foreach ($data as $item)
            <h1 >Delete Comment :</h1>
            <h2 class="font-delete-strong">Movie : {{ $item->movie->judul }}</h2>
            <h2 class="font-delete-strong">Comment : {{ $item->text }}</h2>
            <form action="/comment-destroy/{{ $item->id }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Delete this comment</button>
                <button class="btn btn-warning">Back</button>
            </form>

        @endforeach
        
    </div>

@endsection