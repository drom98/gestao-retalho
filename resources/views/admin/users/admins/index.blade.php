@extends('admin.dashboard.layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1 class="h3 mb-4 text-gray-800">
                Administradores registados
                <span class="badge badge-pill badge-secondary">
                    {{ \App\Admin::count() }}
                </span>
            </h1>
        </div>
        <div class="col" style="text-align: right">
            <a href="{{ route('admin.administrador.create') }}" class="btn btn-sm btn-dark">Adicionar administrador</a>
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
        <div class="card-header py-3">

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                </div>
                <table class="table table-bordered" id="tabela-tiposVidro" width="100%">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Nome de utilizador</th>
                        <th>Email</th>
                        <th>Data</th>
                        <th>Opções</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@stop
@push('datatables')
    <script>
        $(function() {
            $('#tabela-tiposVidro').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese.json'
                },
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.administrador.get') !!}',
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'username', name: 'username' },
                    { data: 'email', name: 'email' },
                    { data: 'created_at', name: 'created_at'},
                    { data: 'opcoes', name: 'opcoes'}
                ]
            });
        });
    </script>
@endpush
