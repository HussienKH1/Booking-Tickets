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
            $query->whereHas('eventType', function($query) use ($eventTypes) {
                $query->whereIn('id', $eventTypes);
            })->get();
        }

        $events = $query->get();
        
        return view('partials.events_list', compact('events'))->render();
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

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}
