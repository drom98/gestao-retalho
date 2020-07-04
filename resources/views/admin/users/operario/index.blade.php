@extends('admin.dashboard.layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        Operários registados
        <span class="badge badge-pill badge-secondary">
            {{ \App\User::count() }}
        </span>
    </h1>

    @if (session('sucesso'))
        @include('includes.mensagemSucesso')
    @endif
    @if (session('erro'))
        @include('includes.mensagemErro')
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabela</h6>
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
                ajax: '{!! route('admin.operario.get') !!}',
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
