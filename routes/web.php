<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SportController; 
use App\Http\Controllers\BookingController;


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
Route::get('/events/type/{id}', [EventController::class, 'Eventsfilter'])->name('eventsfilter');
Route::get('/sports/type/{id}', [SportController::class, 'Sportsfilter'])->name('sportsfilter');
Route::get('/movies/{id}', [MovieController::class, 'show'])->name('movie_detail');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/movies/moviesbooking/{id}', [MovieController::class, 'moviesbookig']) -> name('moviesbooking') -> middleware('auth');
Route::get('/events/eventsbooking/{id}', [EventController::class, 'eventsbooking']) -> name('eventsbooking') -> middleware('auth');
Route::get('/sports/sportsbooking/{id}', [SportController::class, 'sportsbooking']) -> name('sportsbooking') -> middleware('auth');
Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.page');


