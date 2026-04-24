<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::prefix('cms/admin')-> group(function (){
Route::view('','cms.parent');
Route::resource('countries',CountryController::class);
Route::post('countries_update/{id}',[CountryController::class, 'update'])->name('countries_update');

Route::resource('cities', CityController::class);
Route::post('cities_update/{id}',[CityController::class, 'update'])->name('cities_update');

Route::resource('admins', AdminController::class);
Route::post('admins_update/{id}',[AdminController::class, 'update'])->name('admins_update');

Route::resource('clients', ClientController::class);
Route::post('clients_update/{id}',[ClientController::class, 'update'])->name('clients_update');

Route::resource('reviews', ReviewController::class);
Route::post('reviews_update/{id}',[ReviewController::class, 'update'])->name('reviews_update');

});
