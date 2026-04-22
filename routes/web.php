<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
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


});