<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the movies.
     */
    public function index()
    {
        $movies = Movie::all();
        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new movie.
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created movie in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'release_date' => 'nullable|date',
            'rating' => 'nullable|numeric|min:1|max:10',
            'runtime' => 'nullable|integer',
            'director' => 'nullable|string|max:255',
            'cast' => 'nullable|string',
            'synopsis' => 'nullable|string',
            'language' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'poster_url' => 'nullable|url',
            'trailer_url' => 'nullable|url',
            'availability_status' => 'nullable|boolean',
            'screening_times' => 'nullable|json',
            'ticket_price' => 'nullable|numeric|min:0',
        ]);

        Movie::create($request->all());

        return redirect()->route('movies.index')->with('success', 'Movie created successfully.');
    }

    /**
     * Display the specified movie.
     */
    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified movie.
     */
    public function edit(Movie $movie)
    {
        return view('movies.edit', compact('movie'));
    }

    /**
     * Update the specified movie in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'release_date' => 'nullable|date',
            'rating' => 'nullable|numeric|min:1|max:10',
            'runtime' => 'nullable|integer',
            'director' => 'nullable|string|max:255',
            'cast' => 'nullable|string',
            'synopsis' => 'nullable|string',
            'language' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'poster_url' => 'nullable|url',
            'trailer_url' => 'nullable|url',
            'availability_status' => 'nullable|boolean',
            'screening_times' => 'nullable|json',
            'ticket_price' => 'nullable|numeric|min:0',
        ]);

        $movie->update($request->all());

        return redirect()->route('movies.index')->with('success', 'Movie updated successfully.');
    }

    /**
     * Remove the specified movie from storage.
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('movies.index')->with('success', 'Movie deleted successfully.');
    }
}
