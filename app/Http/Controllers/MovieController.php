<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Event_Type;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Sport_type;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the movies.
     */
    public function movies()
    {
        $movies = Movie::all();
        $genres = Genre::all();
        $event_types = Event_Type::all();
        $sporttypes = Sport_type::all();
        return view('movies', compact('movies', 'genres', 'event_types', 'sporttypes'));
    }

    public function filterByGenre($id)
    {
        $genre = Genre::findOrFail($id);
        $genres = Genre::all();
        $event_types = Event_Type::all();
        $sporttypes = Sport_type::all();
        $movies = Movie::whereHas('genres', function ($query) use ($id) {
            $query->where('genre_id', $id);
        })->get();

        return view('movies', compact('movies', 'genres', 'event_types', 'sporttypes'));
    }

    public function filterMovies(Request $request)
    {
        $selectedGenres = $request->input('genres', []);

        $movies = Movie::when(!empty($selectedGenres), function ($query) use ($selectedGenres) {
            return $query->whereHas('genres', function ($q) use ($selectedGenres) {
                $q->whereIn('genre_id', $selectedGenres);
            });
        })->get();


        return view('partials.movies_list', compact('movies'))->render();
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $movies = Movie::where('title', 'like', '%' . $query . '%')->get();

        return view('partials.movies_list', compact('movies'))->render();;
    }

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

    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        $movies = Movie::all();
        $genres = Genre::all();
        $event_types = Event_Type::all();
        $sporttypes = Sport_type::all();
        return view('movie_detail', compact('movie', 'genres', 'event_types', 'sporttypes'));
    }

    public function moviesbookig($id){
        $genres = Genre::all();
        $event_types = Event_Type::all();
        $sporttypes = Sport_type::all();
        $movie = Movie::findOrFail($id);
        return view('booking', compact('genres', 'event_types', 'sporttypes', 'movie'));
    }

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
