@extends('dashboard.layouts.app')

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
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabela</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                </div>
                <table class="table table-bordered" id="retalhoTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Lote</th>
                            <th>Comprimento</th>
                            <th>Largura</th>
                            <th>Área</th>
                            <th>Tipo Vidro</th>
                            <th>Localizaçao</th>
                            <th>Opçoes</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Lote</th>
                            <th>Comprimento</th>
                            <th>Largura</th>
                            <th>Área</th>
                            <th>Tipo Vidro</th>
                            <th>Localizaçao</th>
                            <th>Opçoes</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($retalho as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->comprimento }}</td>
                            <td>{{ $item->largura }}</td>
                            <td>{{ $item->area }}</td>
                            <td class="w-75">
                                <a href="#" class="btn btn-primary btn-sm btn-icon-split btn-block justify-content-start">
                                    <span class="icon text-white-50">
                                      <i class="fas fa-edit"></i>
                                    </span>
                                    <span class="text">Usar retalho</span>
                                </a>
                                <a href="/retalho/{{ $item->id }}/edit" class="btn btn-success btn-sm btn-icon-split btn-block justify-content-start">
                                    <span class="icon text-white-50">
                                      <i class="fas fa-edit"></i>
                                    </span>
                                    <span class="text">Editar</span>
                                </a>
                                <a href="#" class="btn btn-danger btn-sm btn-icon-split btn-block justify-content-start">
                                    <span class="icon text-white-50">
                                      <i class="fas fa-trash"></i>
                                    </span>
                                    <span class="text">Apagar</span>
                                </a>
                                <form action="{{ route('retalho.destroy', $item->id) }}" method="post" style="width: auto;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
