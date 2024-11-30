<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\TourplanController;
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



// admin
Route::prefix('/admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('Admin.dashboard');
    })->name('dashboard');

    Route::resource('country', CountryController::class);
    Route::resource('city', CityController::class);
    Route::resource('tours', TourController::class);
    Route::get('/tours/image_uploads/{id}', [TourController::class,'imagesUpload'])->name('tour.imagesUpload'); 
    Route::get('/tours/plans/{id}', [TourController::class,'plans'])->name('tour.plans'); 
    Route::post('/tours/images/upload', [DropdownController::class, 'uploadImage'])->name('tours.images.upload');
    Route::post('/tours/images/EditImages', [DropdownController::class, 'EditImages'])->name('tours.images.EditImages');
    Route::delete('/tours/images/remove', [DropdownController::class, 'removeImage'])->name('tours.images.remove');
    Route::delete('/tours/images/removeUploaded', [DropdownController::class, 'removeUploaded'])->name('tours.images.removeUploaded');
    Route::resource('/tourplans',TourplanController::class);
});