<?php

namespace App\Http\Controllers;

use App\Models\Event_Type;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function Home()
    {
        $movies = Movie::with('genres')->get();
        $genres = Genre::all();
        $event_types = Event_Type::all();
        return view('home', compact('movies', 'genres', 'event_types'));
    }
}
