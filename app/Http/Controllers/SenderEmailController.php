<?php

namespace App\Http\Controllers;

use App\Mail\EmailSender;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SenderEmailController extends Controller
{
    public function send()
    {
        // Mail::to('farmovie123@gmail.com')->send(new EmailSender());
        $user = User::where('email', 'farmovie123@gmail.com')->first();

        \App\Jobs\EmailSender::dispatch($user);

        // when the EmailSender has been successfully to send the email, do something...

        return 'Done!';
    }
}
