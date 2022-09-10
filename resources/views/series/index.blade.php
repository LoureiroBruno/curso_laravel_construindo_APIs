<x-app-layout>
    <x-slot:title>
        {{-- Series - Listar Itens --}}
        {{ __('messages.app_name') }}
        </x-slot>
        <x-slot:header>
            Exibir todas as Séries
            </x-slot>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    @if (session('success'))
                        <div class="alert alert-success">
                            <img src="{{ asset('img/check-lg.svg') }}" />
                            {{ session('success') }}
        
                        </div>
                    @elseif (session('danger'))
                        <div class="alert alert-danger">
                            <img src="{{ asset('img/info.svg') }}" />
                            {{ session('danger') }}
                        </div>
                    @endif

                    <a href="{{ route('series.create') }}" class="btn btn-warning mb-4" tabindex="-1" role="button"
                        aria-disabled="true" title="Criar Nova Série">Registrar</a>
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <table id="tabela-series" class="table table-hover">
                                <thead class="thead-tabela-series-topo">
                                    <tr class="th-tabela-series">
                                        <th scope="col">#</th>
                                        <th scope="col">Descrição</th>
                                        <th scope="col">Detalhes</th>
                                        <th scope="col">Data de Inscrição</th>
                                        <th scope="col">Data de Edição</th>
                                        <th scope="col" class="col-2" id="th-coluna-acoes-tabela-series">Painel de
                                            Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($series as $serie)
                                        <tr>
                                            <th scope="row">{{ $serie->id }}</th>
                                            <td>{{ $serie->nome }}</td>
                                            <td>
                                                <form action="{{ route('seasons.index', $serie->id) }}" method="get">
                                                    @csrf

                                                    <button type="submit" class="btn btn-link">
                                                        <img class="img-tabela-series"
                                                            src="{{ asset('img/detalhes.svg') }}"
                                                            title="Clique aqui para mais detalhes" />
                                                    </button>
                                                </form>
                                            </td>
                                            <td>{{ $serie->created_at }}</td>
                                            <td>{{ $serie->updated_at }}</td>
                                            <td id="td-coluna-acoes-tabela-series">
                                                <div>
                                                    <form action="{{ route('series.edit', $serie->id) }}" method="get"
                                                        id="btn-update">
                                                        @csrf
                                                        @method('EDIT')
                                                        <button type="submit"
                                                            class="btn btn-outline-secondary btn-sm mb-1 ms-1"
                                                            title="{{ $serie->nome }}">
                                                            <img src="{{ asset('img/pencil.svg') }}" />
                                                            Editar
                                                        </button>
                                                    </form>

                                                    <form action="{{ route('series.destroy', $serie->id) }}"
                                                        method="post" id="btn-destroy" title="{{ $serie->nome }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-outline-danger btn-sm mb-1">
                                                            <img src="{{ asset('img/trash.svg') }}" />
                                                            Excluir
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <thead class="thead-tabela-series-footer">
                                    <tr class="th-tabela-series">
                                        <th scope="col">#</th>
                                        <th scope="col">Descrição</th>
                                        <th scope="col">Detalhes</th>
                                        <th scope="col">Data de Inscrição</th>
                                        <th scope="col">Data de Edição</th>
                                        <th scope="col" class="col-2" id="th-coluna-acoes-tabela-series">Painel de
                                            Ações</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


</x-app-layout>

<script>
    $(document).ready(function() {
        $('#tabela-series').DataTable({
            "offsetTop": 10,
            "ordering": false,
            "bPaginate": true,
            "bScrollCollapse": true,
            "language": {
                "search": "Pesquisar: ",
                "searchPlaceholder": "ID, Descrição etc",
                "lengthMenu": "Mostrando: _MENU_ registros por página",
                "zeroRecords": "Nenhum registro encontrado",
                "info": "Exibindo página _PAGE_ de _PAGES_ ",
                "infoEmpty": "Exibindo página _PAGES_ de _PAGES_ ",
                "infoFiltered": "(filtrado de _MAX_ registros no total)",
                "paginate": {
                    "previous": "Voltar",
                    "next": "Avançar"
                }
            },
        });
    });
</script>
