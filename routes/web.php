<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Website.home.hero.main');
})->name('home');
Route::get('/about_us', function () {
    return view('Website.about.about');
})->name('about');
Route::get('/dashboard', function () {
    return view('Admin.dashboard');
})->name('dashboard');

Route::resource('country',CountryController::class);
Route::resource('city',CityController::class);