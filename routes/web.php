<?php

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
