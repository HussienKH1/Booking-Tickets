<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function Home()
    {
        $movies = Movie::all();
        return view('home', compact('movies'));
    }
}
