<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Series;
use Illuminate\Http\Request;

class SeasonsController extends Controller
{
    public function index(Series $series)
    {
        return response()
        ->json([
            'status' => 200,
            'message' => "Temporada(s)/Episodio(s) Encontrada(s) por Série Id: {$series->id} com Sucesso!",
            'seasons' => $series->seasons()->with('episodes')->get()
        ]);
    }
}
