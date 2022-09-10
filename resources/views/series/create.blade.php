<x-app-layout>
    <x-slot:title>
        Series - Cadastrar Item
        </x-slot>
        <x-slot:header>
            Nova Séries
            </x-slot>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <form action="{{ route('series.store') }}" :nome="old('nome')" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-8">
                                        <label for="nome" class="form-label">Nome</label>
                                        <input type="text" class="form-control" id="nome" name="nome"
                                            placeholder="Nome de descrição da série" autofocus autofocus
                                            @isset($nome) value="{{ $nome }}" @endisset>
                                    </div>
                                    <div class="col-2">
                                        <label for="seasonQty" class="form-label">Qtd / Temporadas</label>
                                        <input type="text" class="form-control" id="seasonQty" name="seasonQty"
                                            placeholder="Número de Temporadas"
                                            @isset($seasonQty) value="{{ $seasonQty }}" @endisset>
                                    </div>
                                    <div class="col-2">
                                        <label for="episodesPerSeason" class="form-label">Epsódios / Temporada</label>
                                        <input type="text" class="form-control" id="episodesPerSeason"
                                            name="episodesPerSeason" placeholder="Epsódios por Temporada"
                                            @isset($episodesPerSeason) value="{{ $episodesPerSeason }}" @endisset>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="cover" class="form-label">Capa</label>
                                        <input type="file" class="form-control" id="cover" name="cover" accept="image/gif, image/png, image/jpeg, image/jpg"/>
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <button type="submit" class="btn btn-outline-primary btn-sm mb-3" title="Salvar">
                                        <img src="{{ asset('img/send.svg') }}" />
                                        Salvar
                                    </button>
                                    <a href="{{ route('series.index') }}"
                                        class="btn btn-outline-danger btn-sm mb-3 ms-2" tabindex="-1" role="button"
                                        aria-disabled="true" title="Cancelar">
                                        <img src="{{ asset('img/x-lg.svg') }}" />
                                        Fechar
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </x-app-layout>
