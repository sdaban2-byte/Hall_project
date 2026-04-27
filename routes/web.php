<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HallController;
use App\Http\Controllers\HallOwnerController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;








Route::get('/', function () {
    return view('welcome');
});



Route::prefix('cms/admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::view('', 'cms.parent');
    Route::resource('countries', CountryController::class);
    Route::post('countries_update/{id}', [CountryController::class, 'update'])->name('countries_update');

    Route::resource('cities', CityController::class);
    Route::post('cities_update/{id}', [CityController::class, 'update'])->name('cities_update');

    Route::resource('admins', AdminController::class);
    Route::post('admins_update/{id}', [AdminController::class, 'update'])->name('admins_update');

    Route::resource('clients', ClientController::class);
    Route::post('clients_update/{id}', [ClientController::class, 'update'])->name('clients_update');

    Route::resource('reviews', ReviewController::class);
    Route::post('reviews_update/{id}', [ReviewController::class, 'update'])->name('reviews_update');


    Route::resource('hall_owners', HallOwnerController::class);
    Route::post('hall_owners_update/{id}', [HallOwnerController::class, 'update'])->name('hall_owners_update');


    Route::resource('halls', HallController::class);
    Route::post('halls_update/{id}', [HallController::class, 'update'])->name('halls_update');


    Route::get('/create/halls/{id}', [HallController::class, 'createHall'])->name('createHall');
    Route::get('/index/halls/{id}', [HallController::class, 'indexHall'])->name('indexHall');

    Route::resource('sliders', SliderController::class);
    Route::post('sliders_update/{id}', [SliderController::class, 'update'])->name('sliders_update');


    Route::resource('contactUs', ContactUsController::class);
    Route::post('contactUs_update/{id}', [ContactUsController::class, 'update'])->name('contactUs_update');
});
