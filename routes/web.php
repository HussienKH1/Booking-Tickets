<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SportController;

Route::get('/', [MainController::class, 'Home']);
Route::get('/home', [MainController::class, 'Home'])->name('home');
Route::get('/movies', [MovieController::class, 'movies'])->name('movies');
Route::get('/movies/filter', [MovieController::class, 'filterMovies'])->name('movies.filter');
Route::get('/movies/search', [MovieController::class, 'search'])->name('movies.search');
Route::get('/events/search', [EventController::class, 'search'])->name('events.search');
Route::get('/sports/search', [SportController::class, 'search'])->name('sports.search');
Route::get('/movies/genre/{id}', [MovieController::class, 'filterByGenre'])->name('movies.filterByGenre');
Route::get('/events', [EventController::class, 'events'])-> name ('events');
Route::get('/filter-events', [EventController::class, 'filterEvents'])->name('filter.events');
Route::get('/sports', [SportController::class, 'sports'])-> name ('sports');
Route::get('/filter-sports', [SportController::class, 'filterSports'])->name('filter.sports');
Route::get('/login',[MainController::class, 'login'])->name('login');
Route::get('/signup',[MainController::class, 'signup'])->name('signup');
Route::get('/events/type/{id}', [EventController::class, 'typefilter'])->name('events.typefilter');
Route::get('/booking', [MainController::class, 'booking'])->name('booking')->middleware('auth');


