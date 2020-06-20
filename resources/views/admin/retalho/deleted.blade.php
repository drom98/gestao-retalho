@extends('admin.dashboard.layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1 class="h3 mb-4 text-gray-800">Retalho eliminado</h1>
        </div>
        <div class="col" style="text-align: right">
            <a href="{{ route('admin.retalho.create') }}" class="btn btn-sm btn-dark">Adicionar novo</a>
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
                ajax: '{!! route('admin.retalho.DTeliminado') !!}',
                columns: [
                    { data: 'num_lote', name: 'num_lote' },
                    { data: 'comprimento', name: 'comprimento' },
                    { data: 'largura', name: 'largura' },
                    { data: 'area', name: 'area' },
                    { data: 'tipoVidro', name: 'tipoVidro' },
                    { data: 'localizacao', name: 'localizacao' },
                    { data: 'created_at', name: 'created_at'},
                    { data: 'user', name: 'user' },
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
        });
    </script>
@endpush