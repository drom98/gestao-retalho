@extends('admin.dashboard.layouts.app')

@section('content')
    @include('includes.modalUsarRetalho')
    <div class="row">
        <div class="col">
            <h1 class="h3 mb-4 text-gray-800">
                Retalho disponível
                <span class="badge badge-pill badge-secondary">
                    {{ \App\Retalho::count() }}
                </span>
            </h1>

            <div class="row mb-4">
                <div class="col-md-2">
                    <a href="{{ route('admin.retalho.create') }}" class="btn btn-sm btn-block btn-dark">Adicionar novo</a>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-sm btn-block btn-secondary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Pesquisa avançada
                    </button>
                </div>
            </div>

            <div class="collapse" id="collapseExample">
                <div class="card mb-3">
                    <div class="card-body">
                        <form>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="lote">Lote:</label>
                                    <input type="text" class="form-control form-control-sm" id="lote">
                                </div>
                                <div class="form-group col">
                                    <label for="comprimento">Comprimento:</label>
                                    <input type="number" class="form-control form-control-sm" id="comprimento">
                                </div>
                                <div class="form-group col">
                                    <label for="largura">Largura:</label>
                                    <input type="number" class="form-control form-control-sm" id="largura">
                                </div>
                                <div class="form-group col">
                                    <label for="area">Área:</label>
                                    <input type="number" class="form-control form-control-sm" id="area">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="tipoVidro">Tipo de vidro:</label>
                                    <select name="tipoVidro" id="tipoVidro"></select>
                                </div>
                                <div class="form-group col">
                                    <label for="localizacao">Localização:</label>
                                    <select name="localizacao" id="input_localizacao"></select>
                                </div>
                                <div class="form-group col">
                                    <label for="utilizador">Utilizador:</label>
                                    <select name="utilizador" id="utilizador"></select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @if (session('sucesso'))
        @include('includes.mensagemSucesso')
    @endif
    @if (session('errors'))
        @include('includes.mensagemErro')
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            @include('includes.tabelaRetalho')
        </div>
    </div>
@endsection
@push('datatables')
    <script>
        $(function() {
            $('#tabela-retalho').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese.json'
                },
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.retalho.get') !!}',
                columns: [
                    { data: 'num_lote', name: 'num_lote' },
                    { data: 'comprimento', name: 'comprimento' },
                    { data: 'largura', name: 'largura' },
                    { data: 'area', name: 'area' },
                    { data: 'tipoVidro', name: 'tipoVidro' },
                    { data: 'localizacao', name: 'localizacao' },
                    { data: 'created_at', name: 'created_at'},
                    { data: 'opcoes', name: 'opcoes', orderable: false}
                ]
            });
        });

    </script>
@endpush

@push('select-search')
    <script !src="">
        $(document).ready(function() {
            $('.seccaoSelect').select2({theme: 'bootstrap4'});
            $('#tipoVidro').select2({theme: 'bootstrap4'});
            $('#input_localizacao').select2({theme: 'bootstrap4'});
            $('#utilizador').select2({theme: 'bootstrap4'});
        });
    </script>
@endpush
