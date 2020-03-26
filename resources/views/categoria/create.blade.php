@extends('dashboard.layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Adicionar categoria</h1>
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
                    Adicionar nova categoria
                </div>
                <div class="card-body">
                    <form class="user" method="POST" action="/categoria">
                        @csrf
                        <div class="form-group">
                            <label for="comprimento">Nome:</label>
                            <input name="nome" id="nome" type="text" class="form-control" placeholder="Nome da categoria">
                        </div>
                        <button type="submit" class="btn btn-primary btn-user">Adicionar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/main.js') }}"></script>

    <script !src="">
        const comprimentoEl = document.querySelector('#comprimento');
        const larguraEl = document.querySelector('#largura');
    </script>
@endsection
