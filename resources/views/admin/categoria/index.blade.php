@extends('admin.dashboard.layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        Categorias
        <span class="badge badge-pill badge-secondary">
            {{ \App\Categoria::count() }}
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
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabela</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                </div>
                <table class="table table-bordered" id="tabela-categorias" width="100%">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Data</th>
                        <th>Opções</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>


@endsection
@push('datatables')
    <script>
        $(function() {
            $('#tabela-categorias').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese.json'
                },
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.categoria.get') !!}',
                columns: [
                    { data: 'nome', name: 'nome' },
                    { data: 'created_at', name: 'created_at'},
                    { data: 'opcoes', name: 'opcoes', orderable: false },
                ]
            });
        });
    </script>
@endpush
