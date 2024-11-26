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


    public function adminfilterEvents(Request $request)
    {
        $eventType = $request->input('typeSelect', 'all');
        $filterOption = $request->input('filterSelect', 'all');

        $query = Event::query();

        if ($eventType !== 'all') {
            $query->whereHas('eventType', function ($query) use ($eventType) {
                $query->whereIn('id', (array) $eventType);
            });
        }

        switch ($filterOption) {
            case 'available':
                $query->where('availability_status', true);
                break;
            case 'unavailable':
                $query->where('availability_status', false);
                break;
            case 'decNaming':
                $query->orderBy('title', 'asc');
                break;
            case 'incNaming':
                $query->orderBy('title', 'desc');
                break;
            case 'decPrice':
                $query->orderBy('ticket_price', 'desc');
                break;
            case 'incPrice':
                $query->orderBy('ticket_price', 'asc');
                break;
            default:
                break;
        }

        $events = $query->get();
        return view('admin.partials.eventslist', compact('events'))->render();
    }

    public function adminsearch(Request $request)
    {
        $query = $request->input('query');
        $events = Event::where('title', 'like', '%' . $query . '%')->get();
        return view('admin.partials.eventslist', compact('events'))->render();; 
    }



    public function eventsbooking($id)
    {
        $genres = Genre::all();
        $event_types = Event_Type::all();
        $sporttypes = Sport_type::all();
        $event = Event::findOrFail($id);
        return view('booking', compact('genres', 'event_types', 'sporttypes', 'event'));
    }

    public function create()
    {
        $event_types = Event_Type::all();

        return view('admin.addevents', compact('event_types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'event_type' => 'required|string|exists:event_type,name',
            'event_date' => 'nullable|date',
            'event_time' => 'nullable|date_format:H:i',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'ticket_price' => 'nullable|numeric|min:0',
            'poster_url' => 'nullable|url',
            'availability_status' => 'boolean',
        ]);

        Event::create($request->all());

        return redirect()->route('admin.events')->with('success', 'Event created successfully.');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'event_type' => 'required|string|exists:event_type,name',
            'event_time' => 'nullable|date_format:H:i',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'ticket_price' => 'nullable|numeric|min:0',
            'poster_url' => 'nullable|url',
            'availability_status' => 'boolean',
        ]);

        $event = Event::findOrFail($id);
        $event->update($validatedData);
        return redirect()->route('admin.events')->with('success', 'Event updated successfully.');
    }

    public function deleteEvent($id)
    {
        try {
            $event = Event::findOrFail($id);
            $event->delete();
            return response()->json(['message' => 'Event deleted successfully!']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete the event.'], 500);
        }
    }
}
