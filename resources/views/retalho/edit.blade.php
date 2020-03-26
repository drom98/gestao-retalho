@extends('dashboard.layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Editar retalho</h1>
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
                      Editar retalho nº {{ $retalho-> id }}
                    </div>
                    <div class="card-body">
                        <form class="user" method="POST" action="{{ route('retalho.update', $retalho->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="comprimento">Comprimento</label>
                                <input value="{{ $retalho->comprimento }}" name="comprimento" id="comprimento" step="0.01" type="number" class="form-control" placeholder="Comprimento">
                            </div>
                            <div class="form-group">
                                <label for="largura">Largura</label>
                                <input value="{{ $retalho->largura }}" name="largura" id="largura" step="0.01" type="number" class="form-control" placeholder="Largura">
                            </div>
                            <div class="form-group">
                                <label for="area">Área</label>
                                <input value="{{ $retalho->area }}" type="number" step="0.01" name="area" id="area" class="form-control" readonly>
                            </div>
                            <a href="{{ URL::previous() }}" class="btn btn-danger btn-user">Cancelar</a>
                            <button type="submit" class="btn btn-success btn-user">Guardar</button>
                          </form>
                    </div>
                  </div>
            </div>
        </div>

        <script src="{{ asset('js/main.js') }}"></script>
@endsection
