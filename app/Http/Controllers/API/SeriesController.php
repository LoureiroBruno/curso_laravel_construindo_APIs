<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequestCreate;
use App\Http\Requests\SeriesFormRequestUpdate;
use App\Models\Series;
use App\Repositories\EloquentSeriesRepository;

class SeriesController extends Controller
{
    public function __construct(private EloquentSeriesRepository $seriesRepository) 
    {
        $this->repository = $seriesRepository;
    }

    public function index() 
    {
        return response()
        ->json([
            'status' => 200,
            'message' => 'Serie(s) Encontrada(s) com Sucesso!',
            'series' => Series::all()
        ]);
    }

    public function store(SeriesFormRequestCreate $request)
    {
        return response()
        ->json([
            'status' => 201,
            'message' => "Criado a Série com Sucesso!",
            'series' => $this->seriesRepository->add($request),
        ]);
    }

    public function show(int $series)
    {
        
        $series = Series::whereId($series)->first();
        if($series === null) {
            return response()->json(
                ['message'=>'Serie não Encontrada'], 
                404
            );
        }

        return response()
        ->json([
            'status' => 200,
            'message' => "Encontrado Série por ID: {$series->id} com Sucesso!",
            'series' => $series,
        ]);
    }

    public function update(int $series, SeriesFormRequestUpdate $request) 
    {
        $series = Series::whereId($series)->first();
        if($series === null) {
            return response()->json([
                'status' => 404,
                'message' => "Serie não Encontrada",
            ]);
        }

        $series = $this->seriesRepository->update($request, $series);
        return response()
        ->json([
            'status' => 204,
            'message' => "Atualizado Série por ID: {$series->id} com Sucesso!",
            'series' => $series
        ]);
    }

    public function destroy(int $serie) 
    {
        Series::destroy($serie);

        /** retorna com a resposta vazia com status 204 */
        return response()->noContent();
    }
}
