<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function notification(Notification $notif)
    {
        Notification::find($notif->id)->update([
           'isRead' => 1,
        ]);
        return response()->json(['success' => $notif->link]);

    }
}
