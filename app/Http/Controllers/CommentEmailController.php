<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Jobs\CommentJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentEmailController extends Controller
{
    public function sendEmail(){

        $email = Auth::user();

        $commentNotifData = [
            'body' => 'Your Review Has Been Added',
            'commentText' => 'Testing Comment',
            'url' => url('/'),
            'thankyou' => 'Thank You for Reviewing!!'
        ];
        
        dispatch(new CommentJob($email, $commentNotifData))->delay(Carbon::now()->addSecond(15));

        dd('berhasil');
       
    }
}
