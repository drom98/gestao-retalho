@extends('admin.dashboard.layouts.app')

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
                                <label for="comprimento">Lote:</label>
                                <input name="lote" id="lote" step="1" type="number" class="form-control" placeholder="Lote">
                            </div>
                            <div class="form-group">
                                <label for="comprimento">Comprimento(mm):</label>
                              <input name="comprimento" id="comprimento" step="1" type="number" class="form-control" placeholder="Comprimento(mm)">
                            </div>
                            <div class="form-group">
                                <label for="largura">Largura(mm):</label>
                                <input name="largura" id="largura" step="1" type="number" class="form-control" placeholder="Largura(mm)">
                            </div>
                            <div class="form-group">
                                <label for="largura">Tipo vidro:</label>
                                <select class="custom-select tipoVidroSelect" name="tipoVidro">
                                    @foreach($tiposVidro as $tipoVidro)
                                        <option value="{{ $tipoVidro->id }}">{{ $tipoVidro->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="largura">Localizaçao:</label>
                                <select class="custom-select localizacaoSelect" name="localizacao">
                                    @foreach($localizacoes as $localizacao)
                                        <option value="{{ $localizacao->id }}">{{ $localizacao->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="area">Área(m2):</label>
                                <input type="number" step="0.01" name="area" id="area" class="form-control" readonly>
                            </div>
                            <button type="submit" class="btn btn-primary">Adicionar</button>
                          </form>
                    </div>
                  </div>
            </div>
        </div>

    @push('select-search')
        <script !src="">
            $(document).ready(function() {
                $('.tipoVidroSelect').select2({theme: 'bootstrap4'});
                $('.localizacaoSelect').select2({theme: 'bootstrap4'});
            });
        </script>
    @endpush
@endsection
