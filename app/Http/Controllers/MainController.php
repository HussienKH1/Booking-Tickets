<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Sport;
use App\Models\Event_Type;
use App\Models\Sport_type;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function Home()
    {
        $movies = Movie::with('genres')->get();
        $genres = Genre::all();
        $event_types = Event_Type::all();
        $events = Event::all();
        $sportsEvents = Sport::where('availability_status', true)->take(7)->get();
        $sporttypes = Sport_type::all();
        return view('home', compact('movies', 'genres', 'event_types', 'events', 'sportsEvents', 'sporttypes'));
    }

    public function login(){
        $genres = Genre::all();
        $event_types = Event_Type::all();
        $sporttypes = Sport_type::all();
        return view('auth.login', compact('genres', 'event_types', 'sporttypes'));
    }

    public function signup(){
        $genres = Genre::all();
        $event_types = Event_Type::all();
        $sporttypes = Sport_type::all();
        return view('auth.signup', compact('genres', 'event_types', 'sporttypes'));
    }

    public function booking (){
        return view ('booking');
    }
}
