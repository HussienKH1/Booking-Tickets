<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Mail\ContactEmail;
use App\Models\Event_Type;
use App\Models\Sport_type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactUs extends Controller
{
    public function view(){
        $genres = Genre::all();
        $event_types = Event_Type::all();
        $sporttypes = Sport_type::all();
        $user = Auth::user();
        return view('contactus', compact('genres', 'event_types', 'sporttypes', 'user'));
    }
    public function sendEmail(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);
    
        $emailData = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'message' => $validated['message'],
        ];
    
        Mail::to('aboubakerkhatib9@gmail.com')->send(new ContactEmail($emailData));
    
        return back()->with('success', 'Your message has been sent!');
    }
}
