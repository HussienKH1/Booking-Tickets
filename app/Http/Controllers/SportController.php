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
        $sportsEvents=Sport::all();
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
            $query->whereHas('sportType', function($query) use ($sportTypes) {
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

    public function search(Request $request)
    {
        $query = $request->input('query');
        $sportsEvents = Sport::where('title', 'like', '%' . $query . '%')->get();
        return view('partials.sports_list', compact('sportsEvents'))->render();;
    }

    public function sportsbooking($id){
        $genres = Genre::all();
        $event_types = Event_Type::all();
        $sporttypes = Sport_type::all();
        $sport = Sport::findOrFail($id);
        return view('booking', compact('genres', 'event_types', 'sporttypes', 'sport'));
    }
}
