<x-app-layout>
    <x-slot:title>
        {{-- Series - Listar Itens --}}
        {{ __('messages.app_name') }}
        </x-slot>
        <x-slot:header>
            Todas as Temporadas de {{ $series->nome }}
            </x-slot>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            @if ($series->cover)
                                <div class="container text-start" id="capa-seasons">
                                    <div class="row">
                                        <div class="col-2">
                                            <strong>Capa do Álbum</strong>
                                        </div>
                                        <div class="col">
                                            <img id="img-capa-serie" src="{{ asset('storage/'.$series->cover) }}" class="img-thumbnail" alt=""/>
                                            <strong class="d-grid gap-3 d-md-flex justify-content-md-center"><u>{{ $series->nome }}</u></strong>
                                        </div>
                                        <div class="col">
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="container text-start" id="capa-seasons">
                                    <div class="row">
                                        <div class="col-2">
                                            <strong>Capa do Álbum</strong>
                                        </div>
                                        <div class="col">
                                            <img id="img-capa-serie" src="{{ asset('storage/series_cover/default.png') }}" class="img-thumbnail" alt="" />
                                            <strong class="d-grid gap-3 d-md-flex justify-content-md-center"><u>{{ $series->nome }}</u></strong>
                                        </div>
                                        <div class="col">
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <br>
                            <table class="table table-sm">
                                <thead class="thead-tabela-series-topo">
                                    <tr class="th-tabela-series">
                                        <th scope="col" id="td-coluna-acoes-tabela-detalhes-series-season">Lançamento
                                            de ({{ count($seasons) }}) Temporada(s)</th>
                                        <th scope="col" id="td-coluna-acoes-tabela-detalhes-series-season"
                                            style="width: 30%">Capa do Álbum</th>
                                        <th scope="col" id="td-coluna-acoes-tabela-detalhes-episodes">Total de
                                            ({{ $seasons[0]->episodes->count() }}) Episódio(s)</th>
                                    </tr>
                                </thead>
                                <tbody class="table-light">
                                    @foreach ($seasons as $season)
                                        <tr>
                                            <td id="td-coluna-acoes-tabela-detalhes-series-season"><a
                                                    href="{{ route('episodes.index', $season->id) }}"
                                                    class="btn btn-warning btn-sm mb-2" tabindex="-1" role="button"
                                                    aria-disabled="true" title="Registrar os episódios">
                                                    <strong>{{ $season->number }}° </strong><i>Temporada</i></a>
                                            </td>
                                            @if ($series->cover)
                                                <td id="td-coluna-acoes-tabela-detalhes-series-season">
                                                    <img id="img-capa-season"
                                                        src="{{ asset('storage/' . $series->cover) }}"
                                                        class="img-thumbnail" alt="" />
                                                </td>
                                            @else
                                                <td id="td-coluna-acoes-tabela-detalhes-series-season">
                                                    <img id="img-capa-season"
                                                        src="{{ asset('storage/series_cover/default.png') }}"
                                                        class="img-thumbnail" alt="" />
                                                </td>
                                            @endif
                                            <td id="td-coluna-acoes-tabela-detalhes-episodes">
                                                <span id="bg-tabela-series-episodes" class="badge bg-danger">
                                                    {{ $season->numberOfWatchedEpisodes() }} |
                                                    {{ $season->episodes->count() }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <thead class="thead-tabela-series-topo">
                                    <tr class="th-tabela-series">
                                        <th scope="col" id="td-coluna-acoes-tabela-detalhes-series-season">Lançamento
                                            de ({{ count($seasons) }}) Temporada(s)</th>
                                        <th scope="col" id="td-coluna-acoes-tabela-detalhes-series-season"
                                            style="width: 30%">Capa do Álbum</th>
                                        <th scope="col" id="td-coluna-acoes-tabela-detalhes-episodes">Total de
                                            ({{ $seasons[0]->episodes->count() }}) Episódio(s)</th>
                                    </tr>
                                </thead>
                            </table>


                            <br>
                            <div class="col-auto">
                                <a href="{{ route('series.index') }}" class="btn btn-outline-danger btn-sm mb-3 ms-2"
                                    tabindex="-1" role="button" aria-disabled="true" title="Cancelar">
                                    <img src="{{ asset('img/x-lg.svg') }}" />
                                    Fechar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</x-app-layout>
