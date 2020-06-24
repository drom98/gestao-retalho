@extends('operario.layout')

@section('content')
    @include('includes.modalUsarRetalho_op')
    @include('includes.modalDelete')

    @if (session('sucesso'))
        @include('includes.mensagemSucesso')
    @endif
    @if (session('errors'))
        @include('includes.mensagemErro')
    @endif
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-dark text-white">
                        <i class="fas fa-arrow-left"></i>
                        Voltar
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @include('includes.tabelaRetalho')
                        </div>
                    </div>
                </div>
            </div>
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
                ajax: '{!! route('retalho.get') !!}',
                columns: [
                    { data: 'num_lote', name: 'num_lote' },
                    { data: 'comprimento', name: 'comprimento' },
                    { data: 'largura', name: 'largura' },
                    { data: 'area', name: 'area' },
                    { data: 'id_tipoVidro', name: 'id_tipoVidro' },
                    { data: 'id_localizacao', name: 'id_localizacao' },
                    { data: 'created_at', name: 'created_at'},
                    { data: 'id_user', name: 'id_user'},
                    { data: 'opcoes', name: 'opcoes', orderable: false}
                ]
            });
        });
    </script>
@endpush
