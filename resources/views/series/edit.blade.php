<x-app-layout>
    <x-slot:title>
        Series - Alterar Item
        </x-slot>
        <x-slot:header>
            Editar - {{ $series->nome }}
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

                            <form action="{{ route('series.update', $series->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="nome" class="form-label">Nome</label>
                                        <input type="text" class="form-control" id="nome" name="nome"
                                            placeholder="Nome de descrição da série" autofocus
                                            @isset($series->nome) value="{{ $series->nome }}" @endisset>
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <button type="submit" class="btn btn-outline-primary btn-sm mb-3" title="Salvar">
                                        <img src="{{ asset('img/send.svg') }}" />
                                        Salvar
                                    </button>
                                    <a href="{{ route('series.index') }}" class="btn btn-outline-danger btn-sm mb-3 ms-2" tabindex="-1"
                                        role="button" aria-disabled="true" title="Cancelar">
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
