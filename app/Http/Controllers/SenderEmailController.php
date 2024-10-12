<?php

namespace App\Http\Controllers;

use App\Mail\EmailSender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SenderEmailController extends Controller
{
    public function send()
    {
        // Mail::to('farmovie123@gmail.com')->send(new EmailSender());

        \App\Jobs\EmailSender::dispatch();

        return 'Done!';
    }
}
