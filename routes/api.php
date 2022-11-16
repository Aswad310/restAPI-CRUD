<?php

use App\Http\Controllers\CountryController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group(function (){
// Read Countries
    Route::get('country', [CountryController::class, 'country']);
// Read Country by ID
    Route::get('country/{id}', [CountryController::class, 'countryByID']);
// Create Country
    Route::post('country', [CountryController::class, 'countrySave']);
// Update Country
    Route::put('country/{id}', [CountryController::class, 'countryUpdate']);
// Delete Country
    Route::delete('country/{id}', [CountryController::class, 'countryDelete']);
});
