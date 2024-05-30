<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function store(Request $request, Event $event)
    {
        $event->reservations()->create($request->only('user_name', 'user_email'));
        return redirect()->route('events.show', $event);
    }
}
