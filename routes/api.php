<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\StarWars\{PeopleController,PlanetController,VehiclesController};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);

Route::middleware('jwt.verify')->group(function() {
    Route::get('starwars/peoples',[PeopleController::class,'index']);
    Route::get('starwars/peoples/{id}',[PeopleController::class,'show']);
    
    Route::get('starwars/planets',[PlanetController::class,'index']);
    Route::get('starwars/planets/{id}',[PlanetController::class,'show']);
    
    Route::get('starwars/vehicles',[VehiclesController::class,'index']);
    Route::get('starwars/vehicles/{id}',[VehiclesController::class,'show']);

});
