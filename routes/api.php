<?php

use App\Http\Controllers\ChartTypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\YearController;

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

// GENDER ROUTES
Route::get('v1/genders', [GenderController::class, 'index']);
Route::post('v1/genders', [GenderController::class, 'store']);
Route::put('v1/gender/{gender}', [GenderController::class, 'update']);
Route::get('v1/gender/{gender}', [GenderController::class, 'show']);
Route::delete('v1/gender/{gender}', [GenderController::class, 'destroy']);

// CHART TYPE ROUTES
Route::get('v1/chart-types', [ChartTypeController::class, 'index']);
Route::post('v1/chart-types', [ChartTypeController::class, 'store']);
Route::put('v1/chart-type/{chart_type}', [ChartTypeController::class, 'update']);
Route::get('v1/chart-type/{chart_type}', [ChartTypeController::class, 'show']);
Route::delete('v1/chart-type/{chart_type}', [ChartTypeController::class, 'destroy']);

// YEAR ROUTES
Route::get('v1/years', [YearController::class, 'index']);
Route::post('v1/years', [YearController::class, 'store']);
Route::put('v1/year/{year}', [YearController::class, 'update']);
Route::get('v1/year/{year}', [YearController::class, 'show']);
Route::delete('v1/year/{year}', [YearController::class, 'destroy']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
