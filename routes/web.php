<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Website.home.hero.main');
})->name('home');
Route::get('/about_us', function () {
    return view('Website.about.about');
})->name('about');
Route::get('/activities', function () {
    return view('Website.Free&easy.index');
})->name('activities');
Route::get('/news', function () {
    return view('Website.News.News');
})->name('news');
Route::get('/product_view', function () {
    return view('Website.Product.view');
})->name('product.view');
Route::get('/checkout', function () {
    return view('Website.checkout.index');
})->name('checkout');
Route::get('/dashboard', function () {
    return view('Admin.dashboard');
})->name('dashboard');
Route::get('/contact', function () {
    return view('Website.contact.contact');
})->name('contact');
Route::get('/message', function () {
    return view('admin.message.index');
})->name('message');

Route::resource('country',CountryController::class);
Route::resource('city',CityController::class);
Route::resource('message',MessageController::class);


Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
