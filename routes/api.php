<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenderController;

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

// GENDER CONTROLLER
Route::get('/genders', [GenderController::class, 'index']);
Route::post('/genders', [GenderController::class, 'store']);
Route::put('/gender/{gender}', [GenderController::class, 'update']);
Route::get('/gender/{gender}', [GenderController::class, 'show']);
// Route::delete('/gender/{gender}', [GenderController::class, 'destroy']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
