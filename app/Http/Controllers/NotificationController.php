<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        return view('notifications.index');
    }

    public function show(Notification $notification)
    {
        $this->authorize('view', $notification);
        return view('notifications.show', compact('notification'));
    }

    public function destroy(Notification $notification)
    {
        $this->authorize('delete', $notification);
        $notification->delete();
        return redirect()->route('notifications.index');
    }

    public function markAsRead(Notification $notification)
    {
        $this->authorize('update', $notification);
        // mark as read logic
        return redirect()->route('notifications.index');
    }
}
