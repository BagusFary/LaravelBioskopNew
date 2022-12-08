<?php

namespace App\Jobs;

use App\Mail\CommentMail;
use Illuminate\Bus\Queueable;
use App\Mail\UserRegisteredMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\CommentNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class CommentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $email,
            $commentNotifData;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $commentNotifData)
    {
        $this->email = $email;
        $this->commentNotifData = $commentNotifData;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        // Menggunakan Mail
        // Mail::to($this->email)->send(new CommentMail());
        
        // Menggunakan Queue
        $this->email->notify(new CommentNotification($this->commentNotifData));

    }
}
