<?php

use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\StateController;
use App\Http\Controllers\Api\CityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/countries',[CountryController::class, 'list']);
Route::get('/countries/{id}',[CountryController::class, 'item']);
Route::post('/countries/create',[CountryController::class, 'create']);
Route::put('/countries/update',[CountryController::class, 'update']);


Route::get('/states',[StateController::class, 'list']);
Route::get('/states/{id}',[StateController::class, 'item']);
Route::post('/states/create',[StateController::class, 'create']);
Route::put('/states/update',[StateController::class, 'update']);


Route::get('/cities',[CityController::class, 'list']);
Route::get('/cities/{id}',[CityController::class, 'item']);
Route::post('/cities/create',[CityController::class, 'create']);
Route::put('/cities/update',[CityController::class, 'update']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
