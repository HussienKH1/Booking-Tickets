<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Event_Type;
use App\Models\Genre;
use App\Models\Sport_type;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function events()
    {
        $events = Event::all();
        $genres = Genre::all();
        $event_types = Event_Type::all();
        $sporttypes = Sport_type::all();
        return view('events', compact('events', 'genres', 'event_types', 'sporttypes'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $events = Event::where('title', 'like', '%' . $query . '%')->get();
        return view('partials.events_list', compact('events'))->render();;
    }

    public function filterEvents(Request $request)
    {
        $query = Event::query();

        if ($request->has('event_types')) {
            $eventTypes = $request->input('event_types');
            $query->whereHas('eventType', function ($query) use ($eventTypes) {
                $query->whereIn('id', $eventTypes);
            })->get();
        }

        $events = $query->get();

        return view('partials.events_list', compact('events'))->render();
    }

    public function Eventsfilter($id)
    {

        $event_type = Event_Type::findOrFail($id);
        $genres = Genre::all();
        $sporttypes = Sport_type::all();
        $event_types = Event_Type::all();
        $events = Event::whereHas('eventType', function ($query) use ($event_type) {
            $query->where('id', $event_type->id);
        })->get();
        return view('events', compact('events', 'genres', 'event_types', 'sporttypes'));
    }

    public function eventsbooking ($id){
        $genres = Genre::all();
        $event_types = Event_Type::all();
        $sporttypes = Sport_type::all();
        $event = Event::findOrFail($id);
        return view ('booking', compact('genres', 'event_types', 'sporttypes', 'event'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'event_type' => 'required|string|max:255',
            'event_date' => 'required|date',
            'event_time' => 'nullable|date_format:H:i',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'ticket_price' => 'nullable|numeric',
            'poster_url' => 'nullable|url',
            'availability_status' => 'boolean',
        ]);

        Event::create($request->all());

        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'event_type' => 'required|string|max:255',
            'event_date' => 'required|date',
            'event_time' => 'nullable|date_format:H:i',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'ticket_price' => 'nullable|numeric',
            'poster_url' => 'nullable|url',
            'availability_status' => 'boolean',
        ]);

        $event->update($request->all());

        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}
