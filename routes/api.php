<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PersonController;
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

//Contacts
Route::get('person/{person_id}/contact/{id}', [ContactController::class, 'show']);
Route::put('person/{person_id}/contact/{id}', [ContactController::class, 'update']);
Route::delete('person/{person_id}/contact/{id}', [ContactController::class, 'destroy']);
Route::post('person/{person_id}/contact', [ContactController::class, 'store']);
Route::get('person/{person_id}/contact', [ContactController::class, 'index']);

//Person
Route::get('person/{id}', [PersonController::class, 'show']);
Route::put('person/{id}', [PersonController::class, 'update']);
Route::delete('person/{id}', [PersonController::class, 'destroy']);
Route::post('person', [PersonController::class, 'store']);
Route::get('person', [PersonController::class, 'index']);



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
