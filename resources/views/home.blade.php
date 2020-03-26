@extends('dashboard.layouts.app')

@section('content')
                <h1 class="h3 text-gray-800">Estatísticas</h1>
                <p class="mb-4">Controlar gastos de retalho...</p>

                @include('dashboard.includes.charts')
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Tabela</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="retalhoTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Comprimento</th>
                                        <th>Largura</th>
                                        <th>Área</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Comprimento</th>
                                        <th>Largura</th>
                                        <th>Área</th>
                                        <th>Ações</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($retalho as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->comprimento }}</td>
                                        <td>{{ $item->largura }}</td>
                                        <td>{{ $item->area }}</td>
                                        <td><i class="fas fa-check-circle"></i></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
          <!-- /.container-fluid -->
        </div>
    </div>
</div>
<!-- End of Page Wrapper -->

<script>
    $(document).ready( function () {
    $('#retalhoTable').DataTable();
} );
</script>
@endsection
