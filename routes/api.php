<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChartTypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\YearController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ProfileController;

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

Route::prefix('v1/')->group(function () {
    //PUBLIC ROUTES
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/genders', [GenderController::class, 'index']);

    // AUTH ROUTES
    Route::group(['middleware' => ['auth:sanctum']], function () {

        // USER PROFILE ROUTES
        Route::get('/user', [ProfileController::class, 'index']);
        Route::put('/user/{user}', [ProfileController::class, 'update']);
        Route::delete('/user/{user}', [ProfileController::class, 'destroy']);
        // LOGOUT ROUTE
        Route::post('/logout', [AuthController::class, 'logout']);
        // GENDER ROUTES
        Route::post('/genders', [GenderController::class, 'store']);
        Route::put('/gender/{gender}', [GenderController::class, 'update']);
        Route::get('/gender/{gender}', [GenderController::class, 'show']);
        Route::delete('/gender/{gender}', [GenderController::class, 'destroy']);

        // CHART TYPE ROUTES
        Route::get('/chart-types', [ChartTypeController::class, 'index']);
        Route::post('/chart-types', [ChartTypeController::class, 'store']);
        Route::put('/chart-type/{chart_type}', [ChartTypeController::class, 'update']);
        Route::get('/chart-type/{chart_type}', [ChartTypeController::class, 'show']);
        Route::delete('/chart-type/{chart_type}', [ChartTypeController::class, 'destroy']);

        // CATEGORY TYPE ROUTES
        Route::get('/genres', [CategoryController::class, 'index']);
        Route::post('/genres', [CategoryController::class, 'store']);
        Route::put('/genre/{category}', [CategoryController::class, 'update']);
        Route::get('/genre/{category}', [CategoryController::class, 'show']);
        Route::delete('/genre/{category}', [CategoryController::class, 'destroy']);

        // YEAR ROUTES
        Route::get('/years', [YearController::class, 'index']);
        Route::post('/years', [YearController::class, 'store']);
        Route::put('/year/{year}', [YearController::class, 'update']);
        Route::get('/year/{year}', [YearController::class, 'show']);
        Route::delete('/year/{year}', [YearController::class, 'destroy']);

        // GROUP ROUTES
        Route::get('/groups', [GroupController::class, 'index']);
        Route::post('/groups', [GroupController::class, 'store']);
        Route::put('/group/{group}', [GroupController::class, 'update']);
        Route::get('/group/{group}', [GroupController::class, 'show']);
        Route::delete('/group/{group}', [GroupController::class, 'destroy']);
    });
});
