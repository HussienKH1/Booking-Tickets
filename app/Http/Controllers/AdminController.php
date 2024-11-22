<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use App\Models\Event;
use App\Models\Movie;
use App\Models\Sport;
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
}
