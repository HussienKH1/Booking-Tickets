<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Sport;
use Database\Seeders\events;
use Illuminate\Http\Request;
use App\Models\booking_events;
use App\Models\booking_movies;
use App\Models\booking_sports;
use App\Models\Event_Type;
use App\Models\Sport_type;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{

    public function myBookings()
    {
        $genres = Genre::all();
        $event_types = Event_Type::all();
        $sporttypes = Sport_type::all();
        $movies = auth()->user()->movies;
        $events = auth()->user()->events;
        $sportsEvents = auth()->user()->sports;
        $bookings = booking_movies::where('user_id', Auth::id())->get();
        return view('mybookings', compact('movies', 'genres', 'event_types', 'sporttypes', 'events', 'sportsEvents', 'bookings'));
    }

    public function bookingmovies(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:255',
            'ticket_count' => 'required|integer|min:1|max:10',
            'ticket_price' => 'required|numeric|between:0,999999.99',
            'total_price' => 'required|numeric|between:0,999999.99',
            'vat' => 'required|numeric|between:0,999999.99',
            'amount_payable' => 'required|numeric|between:0,999999.99',
            'type_id' => 'required|integer',
        ]);

        $booking = new booking_movies();
        $booking->user_id = Auth::id();
        $booking->full_name = $validated['full_name'];
        $booking->email = $validated['email'];
        $booking->phone_number = $validated['phone_number'];
        $booking->ticket_count = $validated['ticket_count'];
        $booking->ticket_price = $validated['ticket_price'];
        $booking->total_price = $validated['total_price'];
        $booking->vat = $validated['vat'];
        $booking->amount_payable = $validated['amount_payable'];
        $booking->movie_id = $validated['type_id'];

        $movie_id = $validated['type_id'];
        $movie = Movie::findOrFail($movie_id);
        $movie->booked += $validated['ticket_count'];
        $movie->save();
        $booking->name = $movie->title;

        $booking->save();

        return redirect()->route('mybookings');
    }
    public function bookingevents(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:255',
            'ticket_count' => 'required|integer|min:1|max:10',
            'ticket_price' => 'required|numeric|between:0,999999.99',
            'total_price' => 'required|numeric|between:0,999999.99',
            'vat' => 'required|numeric|between:0,999999.99',
            'amount_payable' => 'required|numeric|between:0,999999.99',
            'type_id' => 'required|integer',
        ]);

        $booking = new booking_events();
        $booking->user_id = Auth::id();
        $booking->full_name = $validated['full_name'];
        $booking->email = $validated['email'];
        $booking->phone_number = $validated['phone_number'];
        $booking->ticket_count = $validated['ticket_count'];
        $booking->ticket_price = $validated['ticket_price'];
        $booking->total_price = $validated['total_price'];
        $booking->vat = $validated['vat'];
        $booking->amount_payable = $validated['amount_payable'];
        $booking->event_id = $validated['type_id'];

        $event_id = $validated['type_id'];
        $event = Event::findOrFail($event_id);
        $event->booked += $validated['ticket_count'];
        $event->save();
        $booking->name = $event->title;
        $booking->save();
        return redirect()->route('mybookings');
    }

    public function bookingsports(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:255',
            'ticket_count' => 'required|integer|min:1|max:10',
            'ticket_price' => 'required|numeric|between:0,999999.99',
            'total_price' => 'required|numeric|between:0,999999.99',
            'vat' => 'required|numeric|between:0,999999.99',
            'amount_payable' => 'required|numeric|between:0,999999.99',
            'type_id' => 'required|integer',
        ]);
        $booking = new booking_sports();
        $booking->user_id = Auth::id();
        $booking->full_name = $validated['full_name'];
        $booking->email = $validated['email'];
        $booking->phone_number = $validated['phone_number'];
        $booking->ticket_count = $validated['ticket_count'];
        $booking->ticket_price = $validated['ticket_price'];
        $booking->total_price = $validated['total_price'];
        $booking->vat = $validated['vat'];
        $booking->amount_payable = $validated['amount_payable'];
        $booking->sport_id = $validated['type_id'];

        $sport_id = $validated['type_id'];
        $sport = Sport::findOrFail($sport_id);
        $sport->booked += $validated['ticket_count'];
        $sport->save();
        $booking->name = $sport->title;
        $booking->save();
        return redirect()->route('mybookings');
    }

}
