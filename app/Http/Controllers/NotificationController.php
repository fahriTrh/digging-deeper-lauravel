<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\DatabaseNotification;
use App\Notifications\EmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    public function sendNotif()
    {
        $users = User::all();

        Notification::send($users, new EmailNotification());
        return 'success';
    }

    public function sendNotifDB($id)
    {
        $user = User::where('id', $id)->first();
        
        Notification::send($user, new DatabaseNotification($user));

        return redirect()->route('notify.unread', ['id' => $user->id]);
    }

    public function notifyUnread($id)
    {
        $user = User::where('id', $id)->first();
        $notifications = $user->unreadNotifications;

        return view('database.notif', compact('notifications', 'user'));
    }

    public function notifyReadAll($id)
    {
        $user = User::where('id', $id)->first();
        
        $user->unreadNotifications->markAsRead();
        $user->notifications()->delete();

        return back();
    }
}
