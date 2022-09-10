<?php

use App\Http\Controllers\API\SeriesController as ApiSeriesController;
use App\Http\Controllers\API\SeasonsController as ApiSeasonsController;
use App\Http\Controllers\API\EpisodesController as ApiEpisodesController;
// use App\Models\Series;
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


/** return response em json object - fora da autenticação teste*/
// Route::get('/series', function () {
//     return Series::all();
// });

/** Obter todas as series */
// Route::get('/series', [SeriesController::class, 'index']);

Route::apiResource('/series', ApiSeriesController::class);

Route::get('/series/{series}/seasons', [ApiSeasonsController::class, 'index']);

Route::get('/seasons/{season}/episodes', [ApiEpisodesController::class, 'index']);

Route::post('/seasons/{season}/episodes', [ApiEpisodesController::class, 'update']);