<?php

namespace App\Http\Controllers;


use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Notifications\CommentNotification;

class CommentController extends Controller
{
    public function index($id){
        $comment = Comment::with('movie')
                            ->where('user_id', $id)
                            ->get();
        return view('history-review', ['comment' => $comment]);
    }



    public function store(Request $request)
    {       

        // Store Comment Data
        if ($request['rating'] >= 6) {
            return redirect('/')->with('warning', 'Access Denied');
        }
    
        if ($request['text'] == []) {
            return redirect('/')->with('comment-empty', 'Must fill in the comments!');
        }

        if (Comment::where('movie_id', $request->movie_id)->where('user_id', Auth::id())->first()) {
            
            return redirect('/')->with('comment-success', 'Already Commented');
            
         } 

        $comment = Comment::create($request->all());

        // Comment Review Notification

        $user = Auth::user();

        $commentNotifData = [
            'body' => 'Your Review Has Been Added',
            'commentText' => $request->text,
            'url' => url('/'),
            'thankyou' => 'Thank You for Reviewing!!'
        ];

        $user->notify(new CommentNotification($commentNotifData));
        

        if($comment) {
            Session::flash('message', 'Comment Added');
        }

        return redirect('/');

        
    }
    
}
