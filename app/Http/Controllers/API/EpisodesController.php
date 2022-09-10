<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use App\Models\Season;
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

    public function update(Request $request, Season $season) 
    {
        $watchedEpisodes = $request->episodes;
        $season->episodes->each(function (Episode $episode) use ($watchedEpisodes) {
        $episode->watched = in_array($episode->id, $watchedEpisodes);
        });
        $season->push();

        return response()
        ->json([
            'status' => 201,
            'message' => "Marcado como visualizado(s) o(s) episódio(s) {$season->episodes} com sucesso!",
        ]);
    }
}
