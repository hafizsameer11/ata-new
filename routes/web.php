<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\PlantourController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\TourplanController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WebsiteController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebsiteController::class,'home'])->name('home');
Route::get('/about_us', function () {
    return view('Website.about.about');
})->name('about');
Route::get('/activities', function () {
    return view('Website.Free&easy.index');
})->name('activities');
Route::get('/tour/preview/{id}', [WebsiteController::class,'productView'])->name('product.view');
Route::get('/countries', [WebsiteController::class,'countries'])->name('countries');
Route::get('/country/tours/{id}', [WebsiteController::Class,'filterTour'])->name('filterTour');
Route::get('/freeEasy', [WebsiteController::Class,'freeEasy'])->name('Free.easy');
Route::get('/filterSerach', [WebsiteController::Class,'filterSerach'])->name('filterSerach');
Route::get('/destination', [WebsiteController::Class,'destination'])->name('destination');
Route::get('/news', [WebsiteController::Class,'news'])->name('news');
Route::get('/get-available-times', [WebsiteController::class, 'getAvailableTimes'])->name('getAvailableTimes');

Route::get('/checkout', function () {
    return view('Website.checkout.index');
})->name('checkout');
Route::get('/contact', function () {
    return view('Website.contact.contact');
})->name('contact');
Route::get('/profile', function () {
    return view('Website.profile.profile');
})->name('profile');
Route::get('myTours',function(){
    return view('Website.mytour.index');
})->name('mytour');
Route::get('/preview/{id}',[BlogController::class,'Show'])->name('news.shows');




// Route::middleware(AdminMiddleware::class)->group(function () {
    
    Route::prefix('/admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('Admin.dashboard');
        })->name('dashboard');
        Route::get('/dashboard', function () {
            return view('Admin.dashboard');
        })->name('dashboard');
        Route::get('/message', function () {
            return view('admin.message.index');
        })->name('message');
    
        Route::resource('country', CountryController::class);
        Route::get('country/search/filterForm', [CountryController::class,'filterForm'])->name('countries.filterForm');
        Route::resource('/plan_tours',PlantourController::class);
        Route::resource('tours', TourController::class);
        Route::get('/tours/image_uploads/{id}', [TourController::class, 'imagesUpload'])->name('tour.imagesUpload');
        Route::get('/tours/plans/{id}', [TourController::class, 'plans'])->name('tour.plans');
        Route::put('/tours/singleUpdate/{id}', [TourController::class, 'updatesingle'])->name('tour.single.update');
        Route::get('/tours/edit/sinlge/{id}', [TourController::class, 'editSingle'])->name('tour.single.edit');
        Route::get('/tour/search/filterForm', [TourController::class, 'filterForm'])->name('tour.filterForm');
        Route::post('/tours/images/upload', [DropdownController::class, 'uploadImage'])->name('tours.images.upload');
        Route::post('/tours/images/EditImages', [DropdownController::class, 'EditImages'])->name('tours.images.EditImages');
        Route::delete('/tours/images/remove', [DropdownController::class, 'removeImage'])->name('tours.images.remove');
        Route::delete('/tours/images/removeUploaded', [DropdownController::class, 'removeUploaded'])->name('tours.images.removeUploaded');
        Route::resource('/tourplans', TourplanController::class);
        Route::resource('message', MessageController::class);
        Route::resource('/plan_tours',PlantourController::class);
        Route::get('one-day/tours', [TourController::class,'One_day_index'])->name('tours.One_day_index');
        Route::resource('news',BlogController::class)->except('Show');
        Route::get('news/search/filterForm',[BlogController::class,'filterForm'])->name('news.filterForm');
    });
// });
// admin


Route::post('/contactstore', [ContactController::class, 'store'])->name('contact.store');
Route::post('/signup', [LoginController::class, 'signup'])->name('user.signup');
Route::post('/login', [LoginController::class, 'login'])->name('user.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('user.logout');
