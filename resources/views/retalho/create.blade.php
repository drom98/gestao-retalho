@extends('dashboard.layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Adicionar retalho</h1>
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
                      Adicionar novo retalho
                    </div>
                    <div class="card-body">
                        <form class="user" method="POST" action="/retalho">
                            @csrf
                            <div class="form-group">
                                <label for="comprimento">Comprimento</label>
                              <input name="comprimento" id="comprimento" step="0.01" type="number" class="form-control" placeholder="Comprimento">
                            </div>
                            <div class="form-group">
                                <label for="largura">Largura</label>
                                <input name="largura" id="largura" step="0.01" type="number" class="form-control" placeholder="Largura">
                            </div>
                            <div class="form-group">
                                <label for="area">Área</label>
                                <input type="number" step="0.01" name="area" id="area" class="form-control" readonly>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user">Adicionar</button>
                          </form>
                    </div>
                  </div>
            </div>
        </div>

    <script src="{{ asset('js/main.js') }}"></script>
@endsection
