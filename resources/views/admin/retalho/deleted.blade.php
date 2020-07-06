@extends('admin.dashboard.layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1 class="h3 mb-4 text-gray-800">
                Retalho eliminado
                <span class="badge badge-pill badge-secondary">
                    {{ \App\Retalho::onlyTrashed()->count() }}
                </span>
            </h1>
        </div>
    </div>

    @if (session('sucesso'))
        @include('includes.mensagemSucesso')
    @endif
    @if (session('erro'))
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
