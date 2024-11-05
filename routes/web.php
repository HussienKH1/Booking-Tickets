<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;


Route::get('/', [MainController::class, 'Home']);
Route::get('/home', [MainController::class, 'Home'])->name('home');