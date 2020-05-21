<div class="table-responsive">
    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">

    </div>
    <table class="table table-bordered" id="tabela-retalho">
        <thead>
        <tr>
            <th>#</th>
            <th>Lote</th>
            <th>Comprimento</th>
            <th>Largura</th>
            <th>Área</th>
            <th>Tipo Vidro</th>
            <th>Localizaçao</th>
            <th>Data</th>
        </tr>
        </thead>
    </table>
</div>

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
                    { data: 'id', name: 'id' },
                    { data: 'num_lote', name: 'num_lote' },
                    { data: 'comprimento', name: 'comprimento' },
                    { data: 'largura', name: 'largura' },
                    { data: 'area', name: 'area' },
                    { data: 'id_tipoVidro', name: 'id_tipoVidro' },
                    { data: 'id_localizacao', name: 'id_localizacao' },
                    { data: 'created_at', name: 'created_at', orderable: false}
                ]
            });
        });
    </script>
@endpush