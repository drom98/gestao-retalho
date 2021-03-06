@extends('admin.dashboard.layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Editar tipo de vidro</h1>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    {{ $tipoVidro->nome }} ({{ $tipoVidro->categoria->nome }})
                </div>
                <div class="card-body">
                    <form class="user" method="POST" action="{{ route('admin.tipoVidro.update', $tipoVidro->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input name="nome" id="nome" type="text" class="form-control" placeholder="Nome" value="{{ $tipoVidro->nome }}">
                        </div>
                        <div class="form-group">
                            <label for="nome">Categoria:</label>
                            <select class="custom-select tipoVidroSelect" name="categoria">
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <a href="{{ URL::previous() }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/main.js') }}"></script>
@endsection
