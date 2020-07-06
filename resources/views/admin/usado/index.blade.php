@extends('admin.dashboard.layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        Retalho usado
        <span class="badge badge-pill badge-secondary">
                    {{ \App\RetalhoUsado::count() }}
                </span>
    </h1>

    @if (session('sucesso'))
        @include('includes.mensagemSucesso')
    @endif
    @if (session('erro'))
        @include('includes.mensagemSucesso')
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            @include('includes.tabelaRetalhoUsado')
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
                ajax: '{!! route('admin.usado.get') !!}',
                columns: [
                    { data: 'comprimento', name: 'comprimento' },
                    { data: 'largura', name: 'largura' },
                    { data: 'area', name: 'area' },
                    { data: 'id_tipoVidro', name: 'id_tipoVidro' },
                    { data: 'id_seccao', name: 'id_seccao' },
                    { data: 'obs', name: 'obs', orderable: false },
                    { data: 'user', name: 'user', orderable: true },
                    { data: 'num_of', name: 'num_of', orderable: false},
                    { data: 'created_at', name: 'created_at', orderable: true},
                    { data: 'opcoes', name: 'opcoes', orderable: false}
                ]
            });
        });
    </script>
@endpush
