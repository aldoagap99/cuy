<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\HomeController;
;
Route::get('/', function () {
    return view('welcome');
});


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('/paises')->group(function(){
    Route::get('/', [CountryController::class, 'index'])->name('countries');
    Route::get('/pais/{id}', [CountryController::class, 'item'])->name('countries.item');
    Route::post('/crear', [CountryController::class, 'create'])->name('countries.create');
    Route::post('/actualizar',[ CountryController::class, 'update'])->name('countries.update');
    Route::post('/status', [CountryController::class, 'status'])->name('countries.status');
});

Route::prefix('/estados')->group(function(){
    Route::get('/', [StateController::class, 'index'])->name('states');
    Route::get('/estado', [StateController::class, 'item'])->name('states.item');
    Route::post('/crear', [StateController::class, 'create'])->name('states.create');
    Route::post('/actualizar', [StateController::class, 'update'])->name('states.update');
    Route::post('/status', [StateController::class, 'status'])->name('states.status');
});

Route::prefix('/ciudades')->group(function(){
    Route::get('/', [CityController::class, 'index'])->name('cities');
    Route::get('/ciudad', [CityController::class, 'item'])->name('cities.item');
    Route::post('/crear', [CityController::class, 'create'])->name('cities.create');
    Route::post('/actualizar', [CityController::class, 'update'])->name('cities.update');
    Route::post('/status', [CityController::class, 'status'])->name('cities.status');
});