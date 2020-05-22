@extends('admin.dashboard.layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Tipos de Vidro</h1>

    @isset ($sucesso)
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{$sucesso}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endisset

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
                        <th>#</th>
                        <th>Nome</th>
                        <th>Opções</th>
                        <th>Data</th>
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
                ajax: '{!! route('admin.tipoVidro.get') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'nome', name: 'nome' },
                    { data: 'created_at', name: 'created_at'}
                ]
            });
        });
    </script>
@endpush
