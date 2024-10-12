<?php

use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SenderEmailController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/hello', function() {
    return 'Hello';
});

Route::get('/send-email', [SenderEmailController::class, 'send']);
Route::get('/send-notif', [NotificationController::class, 'sendNotif']);
Route::get('/send-notif-database/{id}', [NotificationController::class, 'sendNotifDB']);

Route::get('/notify/unread/{id}', [NotificationController::class, 'notifyUnread'])->name('notify.unread');
Route::get('/notify/readall/{id}', [NotificationController::class, 'notifyReadAll'])->name('notify.readAll');