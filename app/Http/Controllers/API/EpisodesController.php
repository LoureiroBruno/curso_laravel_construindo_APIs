<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    public function index(Season $season)
    {
        return response()
        ->json([
            'status' => 200,
            'message' => "Episódio(s) Encontrada(s) por Temporada ID: {$season->id} com Sucesso!",
            'season' => $season->id,
            'episodes' => $season->episodes
        ]);
    }

    public function show(Series $series) 
    {
        return response()
        ->json([
            'status' => 200,
            'message' => "Episódio(s) Encontrada(s) por Série ID: {$series->id} com Sucesso!",
            'episodes' => $series->episodes
        ]);
    }

    public function update(Request $request, Episode $episode) 
    {
        $episode->watched = $request->watched;
        $episode->save();

        return response()
        ->json([
            'status' => 201,
            'message' => "Marcado como visualizado(s) o(s) episódio(s): {$episode} com sucesso!",
        ]);
    }
}
