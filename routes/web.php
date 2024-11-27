<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Website.home.hero.main');
})->name('home');
Route::get('/about_us', function () {
    return view('Website.about.about');
})->name('about');
