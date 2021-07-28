<?php

use App\Http\Controllers\ChartTypeController;
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
Route::get('v1/genders', [GenderController::class, 'index']);
Route::post('v1/genders', [GenderController::class, 'store']);
Route::put('v1/gender/{gender}', [GenderController::class, 'update']);
Route::get('v1/gender/{gender}', [GenderController::class, 'show']);
Route::delete('/gender/{gender}', [GenderController::class, 'destroy']);

// Chart Types
Route::get('v1/chart-types', [ChartTypeController::class, 'index']);
Route::post('v1/chart-types', [ChartTypeController::class, 'store']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
