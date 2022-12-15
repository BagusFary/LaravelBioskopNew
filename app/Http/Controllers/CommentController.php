<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\Comment;
use App\Jobs\CommentJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


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

         // Comment Queue Jobs

         $email = Auth::user();

         $commentNotifData = [
             'body' => 'Your Review Has Been Added',
             'commentText' => $request->text,
             'url' => url('/'),
             'thankyou' => 'Thank You for Reviewing!!'
         ];
         
         dispatch(new CommentJob($email, $commentNotifData))->delay(Carbon::now()->addSecond(15));

        // Comment Review Notification

        // $user = Auth::user();

        // $commentNotifData = [
        //     'body' => 'Your Review Has Been Added',
        //     'commentText' => $request->text,
        //     'url' => url('/'),
        //     'thankyou' => 'Thank You for Reviewing!!'
        // ];

        // $user->notify(new CommentNotification($commentNotifData));

       
       

        if($comment) {
            Session::flash('message', 'Comment Added');
        }

        
        

        return redirect('/');

        
    }

    public function delete($id)
    {
        $commentData = Comment::with('movie')
        ->where('id', $id)
        ->get();

        return view('comment-delete', ['data' => $commentData]);
    }

    public function destroy($id)
    {
        $comment = Comment::FindOrFail($id);
        $comment->delete();
        if($comment){
            Session::flash('comment-message', 'Delete Comment Success');
        }

        return redirect('/history-comments/');
    }
    
}
