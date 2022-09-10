<?php

namespace App\Http\Controllers;

use App\Events\SeriesDeleted;
use App\Http\Middleware\Autenticador;
use App\Http\Requests\SeriesFormRequestCreate;
use App\Http\Requests\SeriesFormRequestUpdate;
use App\Models\Series;
use App\Repositories\EloquentSeriesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SeriesController extends Controller
{
    /**
     * Undocumented function
     *
     * @param SeriesRepository $repository
     */
    public function __construct(private EloquentSeriesRepository $repository)
    {
        $this->repository = $repository;
        $this->middleware(Autenticador::class)->except('index');
    }

    /**
     * list series function
     *
     * @return string
     */
    public function index()
    {
        /** configurado na model Serie o metodo booted orderBy */
        // $series = Serie::orderBy('nome', 'asc')->get();

        /** recebendo do model Serie ordenado por nome asc */
        $series = Series::all();

        return view('series.index')->with('series', $series);
    }

    /**
     * create series function
     *
     * @return void
     */
    public function create()
    {
        return view('series.create');
    }

    /**
     * store series function
     *
     * @param Request $request
     * @return void
     */
    public function store(SeriesFormRequestCreate $request)
    {
         /** Verified exist field */
        if ($request->hasFile ('cover')) { 
            /** Validation Files */
            $validator = Validator::make($request->all(), [
                'cover' => 'image|mimes:gif,png,jpeg,jpg|max:2048',
            ]);

            if ($validator->fails()) { 
                return redirect()->back()->withErrors($validator);
            }

            $coverPath = $request->file('cover')->store('series_cover', 'public');
            /** add $coverPath to $request*/
            $request->coverPath = $coverPath;
        }

        $serie = $this->repository->add($request);
        /** listener */
        \App\Events\SeriesCreated::dispatch(
            $serie->nome,
            $serie->id,
            $request->seasonQty,
            $request->episodesPerSeason
        );

        return to_route('series.index')->with("success", "Cadastrado a série: '{$serie->nome}' com sucesso!");
    }

    public function destroy(Series $series)
    {
        if ($series == null) {
            return to_route('series.index')->with("danger", "Não foi possível realizar exlusão de cadastro");
        }

        $series->delete();
        
        if ($series->cover != "" || $series->cover != null) { 
            /** listener */
            SeriesDeleted::dispatch(
                $series->cover
            );
        }

        return to_route('series.index')->with("success", "Excluído o Registro #{$series->id} | nome: '{$series->nome}' com Sucesso!");
    }


    public function edit(Series $series)
    {
        return view('series.edit')->with(
            [
                'series' => $series
            ]
        );
    }

    public function update(SeriesFormRequestUpdate $request, Series $series)
    {
        if ($request->nome == null) {
            return to_route('series.index')->with("danger", "Não foi possível realizar atualização de cadastro");
        }

        $request['nome'] = ucwords(strtolower($request['nome'])); 
        $series->fill($request->all());
        $series->save();
        return to_route('series.index')->with("success", "Atualizado a série: '{$series->nome}' com sucesso!");
    }
}
