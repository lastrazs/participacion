<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;
class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('reservations')->get();

        $calendarEvents = $events->map(function($event) {
            return [
                'title' => $event->title,
                'start' => $event->start_time,
                'end' => $event->end_time,
                'extendedProps' => [
                    'description' => $event->description,
                    'reservations' => $event->reservations->map(function($reservation) {
                        return $reservation->only(['user_name', 'user_email']);
                    })
                ]
            ];
        });

        return view('events.index', ['events' => $calendarEvents]);
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'start_time' => Carbon::parse($request->start_time),
            'end_time' => Carbon::parse($request->end_time),
        ]);

        return redirect()->route('events.index');
    }

    public function show(Event $event)
    {
        $event->load('reservations');
        return view('events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
{
    $event->update([
        'title' => $request->title,
        'description' => $request->description,
        'start_time' => Carbon::parse($request->start_time),
        'end_time' => Carbon::parse($request->end_time),
    ]);

    return redirect()->route('events.index');
}

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index');
    }

}
