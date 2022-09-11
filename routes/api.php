<?php

use App\Http\Controllers\API\SeriesController as ApiSeriesController;
use App\Http\Controllers\API\SeasonsController as ApiSeasonsController;
use App\Http\Controllers\API\EpisodesController as ApiEpisodesController;
use App\Models\Series;
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

/** resources de series */
Route::apiResource('/series', ApiSeriesController::class);

/** return todas as temporadas/episodios por id Série*/
Route::get('/series/{series}/seasons', [ApiSeasonsController::class, 'index']);

/** return todos os episodios por id Série */
Route::get('/series/{series}/episodes', [ApiEpisodesController::class, 'show']);

/** return todos os episode por cada id Temporada */
Route::get('/seasons/{season}/episodes', [ApiEpisodesController::class, 'index']);

/** return marcar epsodio como assistido ou não assistido */
Route::patch('/episodes/{episode}', [ApiEpisodesController::class, 'update']);
