<?php

namespace App\Http\Controllers;

use App\Models\Event_Type;
use App\Models\Genre;
use App\Models\Sport;
use App\Models\Sport_type;
use Illuminate\Http\Request;

class SportController extends Controller
{
    public function sports()
    {
        $sportsEvents = Sport::all();
        $genres = Genre::all();
        $event_types = Event_Type::all();
        $sporttypes = Sport_type::all();
        return view('sports', compact('sportsEvents', 'genres', 'event_types', 'sporttypes'));
    }

    public function filterSports(Request $request)
    {
        $query = Sport::query();

        if ($request->has('sporttypes')) {
            $sportTypes = $request->input('sporttypes');
            $query->whereHas('sportType', function ($query) use ($sportTypes) {
                $query->whereIn('id', $sportTypes);
            })->get();
        }

        $sportsEvents = $query->get();
        return view('partials.sports_list', compact('sportsEvents'))->render();
    }

    public function Sportsfilter($id)
    {

        $sport_types = Sport_type::findOrFail($id);
        $genres = Genre::all();
        $sporttypes = Sport_type::all();
        $event_types = Event_Type::all();
        $sportsEvents = Sport::whereHas('sportType', function ($query) use ($sport_types) {
            $query->where('id', $sport_types->id);
        })->get();

        return view('sports', compact('sportsEvents', 'genres', 'event_types', 'sporttypes'));
    }

    public function filter(Request $request)
    {
        $filter = $request->query('filter', 'all');
        $typeFilter = $request->query('type', 'all');
        $query = Sport::query();

        if ($typeFilter !== 'all') {
            $query->whereHas('sportType', function ($query) use ($typeFilter) {
                $query->whereIn('id', (array) $typeFilter);
            });
        }

        switch ($filter) {
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
        return view('admin.partials.sportslist', compact('events'))->render();
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $sportsEvents = Sport::where('title', 'like', '%' . $query . '%')->get();
        return view('partials.sports_list', compact('sportsEvents'))->render();;
    }

    public function sportsbooking($id)
    {
        $genres = Genre::all();
        $event_types = Event_Type::all();
        $sporttypes = Sport_type::all();
        $sport = Sport::findOrFail($id);
        return view('booking', compact('genres', 'event_types', 'sporttypes', 'sport'));
    }

    public function create()
    {
        $sportTypes = Sport_type::all();
        return view('admin.addsports', compact('sportTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'sport_type' => 'required|string|exists:sport_type,name',
            'event_date' => 'nullable|date',
            'event_time' => 'nullable|date_format:H:i',
            'team_a' => 'nullable|string|max:255',
            'team_b' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'ticket_price' => 'nullable|numeric|min:0',
            'poster_url' => 'nullable|url',
            'availability_status' => 'boolean',
        ]);

        Sport::create($request->all());
        return redirect()->route('admin.sports')->with('success', 'Sport created successfully.');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'sport_type' => 'required|string|exists:sport_type,name',
            'event_date' => 'nullable|date',
            'event_time' => 'nullable|date_format:H:i',
            'team_a' => 'nullable|string|max:255',
            'team_b' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'ticket_price' => 'nullable|numeric|min:0',
            'poster_url' => 'nullable|url',
            'availability_status' => 'boolean',
        ]);

        $sport = Sport::findOrFail($id);

        $sport->update($validatedData);
        return redirect()->route('admin.sports')->with('success', 'Sport created successfully.');
    }
    public function destroy($id)
    {
        $sport = Sport::findOrFail($id);

        $sport->delete();

        return response()->json(['message' => 'Sport deleted successfully.']);
    }
}
