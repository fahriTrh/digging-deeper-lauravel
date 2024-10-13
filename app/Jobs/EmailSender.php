<?php

namespace App\Jobs;

use Illuminate\Mail\Events\MessageSent;
use App\Events\EmailHasSent;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class EmailSender implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public User $user
    ){}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->user->email)->send(new \App\Mail\EmailSender());
        // do something..
        EmailHasSent::dispatch($this->user);
    }
}
