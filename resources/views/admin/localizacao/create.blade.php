@extends('admin.dashboard.layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Adicionar localização</h1>
    @error('comprimento')
    <p>{{ $message }}</p>
    @enderror
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
                    Adicionar nova localização
                </div>
                <div class="card-body">
                    <form class="user" method="POST" action="/admin/localizacao">
                        @csrf
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input name="nome" id="nome" type="text" class="form-control" placeholder="Nome da localização">
                        </div>
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
