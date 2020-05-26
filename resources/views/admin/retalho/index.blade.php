@extends('admin.dashboard.layouts.app')

@section('content')
    @include('includes.modalUsarRetalho')
    <h1 class="h3 mb-4 text-gray-800">Retalho</h1>

    @if (session('sucesso'))
        @include('includes.mensagemSucesso')
    @endif
    @if (session('erro'))
        @include('includes.mensagemSucesso')
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
                    { data: 'id', name: 'id' },
                    { data: 'num_lote', name: 'num_lote' },
                    { data: 'comprimento', name: 'comprimento' },
                    { data: 'largura', name: 'largura' },
                    { data: 'area', name: 'area' },
                    { data: 'id_tipoVidro', name: 'id_tipoVidro' },
                    { data: 'id_localizacao', name: 'id_localizacao' },
                    { data: 'created_at', name: 'created_at'},
                    { data: 'id_user', name: 'id_user', orderable: false },
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
