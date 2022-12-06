<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\CommentNotification;

class SendNotifController extends Controller
{
    public function SendNotif(){
        $user = Auth::user();
        dd($user);

        $commentNotifData = [
            'body' => 'Your Review Has Been Added',
            'commentText' => 'Testing Comment',
            'url' => url('/'),
            'thankyou' => 'Thank You for Reviewing!!'
        ];

        $user->notify(new CommentNotification($commentNotifData));
    }
}
