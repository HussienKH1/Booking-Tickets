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
            $query->whereHas('sport_type', function($query) use ($sportTypes) {
                $query->whereIn('id', $sportTypes);
            })->get();
        }

        $sportsEvents = $query->get();
        return view('partials.sports_list', compact('sportsEvents'))->render();
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $sportsEvents = Sport::where('title', 'like', '%' . $query . '%')->get();
        return view('partials.sports_list', compact('sportsEvents'))->render();;
    }

}
