<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Sport;
use App\Models\Booking;
use App\Models\Event_Type;
use App\Models\Sport_type;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $moviesCount = Movie::count();
        $eventsCount = Event::count();
        $sportsCount = Sport::count();
        $UsersCount = User::count();
        $mostBookedMovie = Movie::orderBy('booked', 'desc')->first();
        $mostBookedEvent = Event::orderBy('booked', 'desc')->first();
        $mostBookedSport = Sport::orderBy('booked', 'desc')->first();
        $users = User::all();
        return view('admin.admin', compact('moviesCount', 'eventsCount', 'sportsCount', 'UsersCount', 'mostBookedMovie', 'mostBookedEvent', 'mostBookedSport', 'users'));
    }

    public function movies()
    {
        $genres = Genre::all();
        $movies = Movie::all();
        return view('admin.movies', compact('movies', 'genres'));
    }
    public function events()
    {
        $event_types = Event_Type::all();
        $events = Event::all();
        return view('admin.events', compact('events', 'event_types'));
    }
    public function addmovies()
    {
        $genres = Genre::all();
        return view('admin.addmovies', compact('genres'));
    }
    public function edit($id)
    {
        $movie = Movie::with('genres')->findOrFail($id);
        $genres = Genre::all();

        return view('admin.addmovies', compact('movie', 'genres'));
    }
    public function sportedit($id){
        $event = Sport::with('sportType')->findOrFail($id);
        $sportTypes = Sport_type::all();
        return view('admin.addsports', compact('event', 'sportTypes'));
    }
    public function Eventedit($id){
        $event = Event::with('eventType')->findorFail($id);
        $event_types = Event_Type::all();
        return view('admin.addevents', compact('event', 'event_types'));
    }
    public function sports()
    {
        $event_types = Sport_type::all();
        $events = Sport::all();
        return view('admin.sports', compact('events', 'event_types'));
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function filterUsers(Request $request)
    {
        $filter = $request->input('filter');
        $users = User::query();

        switch ($filter) {
            case 'decNaming':
                $users->orderBy('name', 'asc');
                break;
            case 'incNaming':
                $users->orderBy('name', 'desc');
                break;
            default:
                break;
        }

        $users = $users->get();

        $view = view('admin.partials.userslist', compact('users'))->render();

    }
}
