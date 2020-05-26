@extends('admin.dashboard.layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Retalho</h1>

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

        function getRetalho(id) {
            $.ajax({
                url: "/admin/retalho/usar/get/" + id,
                type: "get",
                dataType: "json",
                success: function (res) {
                    insertData(res);
                }
            });
        }

        function insertData(res) {
            $('#comprimento').val(res.comprimento);
            $('#comprimento').attr('min', res.comprimento);
            $('#largura').val(res.largura);
            $('#largura').attr('min', res.largura);
        }

        $(document).ready(function() {
            $('.seccaoSelect').select2({theme: 'bootstrap4'});

            $('#btnUsarRetalho').click(function () {
                console.log('cenas');
            });
        });
    </script>
@endpush
