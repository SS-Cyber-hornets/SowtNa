<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChartTypeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\YearController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\PlaylistConrtoller;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TrackController;

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
    // YEAR ROUTES
    Route::get('/years', [YearController::class, 'index']);
    Route::post('/years', [YearController::class, 'store']);
    // LABEL ROUTES
    Route::get('/labels', [LabelController::class, 'index']);
    Route::post('/labels', [LabelController::class, 'store']);
    Route::put('/label/{label}', [LabelController::class, 'update']);
    Route::get('/label/{label}', [LabelController::class, 'show']);
    Route::delete('/label/{label}', [LabelController::class, 'destroy']);

    // ALBUMS ROUTES
    Route::get('/albums', [AlbumController::class, 'index']);
    Route::post('/albums', [AlbumController::class, 'store']);
    Route::put('/album/{album}', [AlbumController::class, 'update']);
    Route::get('/album/{album}', [AlbumController::class, 'show']);
    Route::delete('/album/{album}', [AlbumController::class, 'destroy']);



    // AUTH ROUTES
    Route::group(['middleware' => ['auth:sanctum']], function () {


        // TRACKS ROUTES
        Route::get('/tracks', [TrackController::class, 'index']);
        Route::post('/tracks', [TrackController::class, 'store']);
        Route::put('/track/{track}', [TrackController::class, 'update']);
        Route::get('/track/{track}', [TrackController::class, 'show']);
        Route::delete('/track/{track}', [TrackController::class, 'destroy']);

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

        // TAGS ROUTES
        Route::get('/tags', [TagController::class, 'index']);
        Route::post('/tags', [TagController::class, 'store']);
        Route::put('/tag/{tag}', [TagController::class, 'update']);
        Route::get('/tag/{tag}', [TagController::class, 'show']);
        Route::delete('/tag/{tag}', [TagController::class, 'destroy']);


        Route::put('/year/{year}', [YearController::class, 'update']);
        Route::get('/year/{year}', [YearController::class, 'show']);
        Route::delete('/year/{year}', [YearController::class, 'destroy']);

        // PLAYLISTS ROUTES
        Route::get('/playlists', [PlaylistConrtoller::class, 'index']);
        Route::post('/playlists', [PlaylistConrtoller::class, 'store']);
        Route::post('/add_to_playlist', [PlaylistConrtoller::class, 'add_to_playlist']);
        Route::put('/playlist/{playlist}', [PlaylistConrtoller::class, 'update']);
        Route::get('/playlist/{playlist}', [PlaylistConrtoller::class, 'show']);
        Route::delete('/playlist/{playlist}', [PlaylistConrtoller::class, 'destroy']);
        // GROUP ROUTES
        Route::get('/groups', [GroupController::class, 'index']);
        Route::post('/groups', [GroupController::class, 'store']);
        Route::put('/group/{group}', [GroupController::class, 'update']);
        Route::get('/group/{group}', [GroupController::class, 'show']);
        Route::delete('/group/{group}', [GroupController::class, 'destroy']);
    });
});
