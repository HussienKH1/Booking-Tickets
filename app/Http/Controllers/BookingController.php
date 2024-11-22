<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Movie;
use App\Models\Sport;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
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
            'type' => 'required|string|max:255',
            'type_id' => 'required|integer',
        ]);
    
        $booking = new Booking();
        $booking->full_name = $validated['full_name'];
        $booking->email = $validated['email'];
        $booking->phone_number = $validated['phone_number'];
        $booking->ticket_count = $validated['ticket_count']; 
        $booking->ticket_price = $validated['ticket_price']; 
        $booking->total_price = $validated['total_price'];    
        $booking->vat = $validated['vat'];                   
        $booking->amount_payable = $validated['amount_payable'];
        $booking->type = $validated['type'];

        $type = $validated['type'];
        $typeId = $validated['type_id'];

        switch ($type) {
            case 'movie':
                $movie = Movie::findOrFail($typeId);
                $movie->booked += $validated['ticket_count'];
                $movie->save();
                $booking->name = $movie->title;
                break;
    
            case 'event':
                $event = Event::findOrFail($typeId);
                $event->booked += $validated['ticket_count'];
                $event->save();
                $booking->name = $event->title;
                break;
    
            case 'sport':
                $sport = Sport::findOrFail($typeId);
                $sport->booked += $validated['ticket_count'];
                $sport->save();
                $booking->name = $sport->title;
                break;
    
            default:
                throw new \Exception("Invalid booking type.");
        }
        $booking->save();
    
        return redirect()->route('home');
    }
}
