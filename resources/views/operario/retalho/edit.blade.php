@extends('operario.layout')

@section('content')

    @if (session('sucesso'))
        @include('includes.mensagemSucesso')
    @endif
    @if (session('errors'))
        @include('includes.mensagemErro')
    @endif
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="{{ route('retalho.index') }}" class="btn btn-sm btn-dark text-white">
                        <i class="fas fa-arrow-left"></i>
                        Voltar
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form class="user" method="POST" action="{{ route('retalho.update', $retalho->id) }}">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label for="lote">Lote:</label>
                                    <input name="lote" id="lote" type="text" class="form-control" placeholder="Lote" value="{{ $retalho->num_lote }}">
                                </div>
                                <div class="form-group">
                                    <label for="comprimento">Comprimento(mm):</label>
                                    <input name="comprimento" id="comprimento" step="1" type="number" class="form-control" placeholder="Comprimento(mm)" value="{{ $retalho->comprimento }}">
                                </div>
                                <div class="form-group">
                                    <label for="largura">Largura(mm):</label>
                                    <input name="largura" id="largura" step="1" type="number" class="form-control" placeholder="Largura(mm)" value="{{ $retalho->largura }}">
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
                                    <label for="area">Área</label>
                                    <input value="{{ $retalho->area }}" type="number" step="0.01" name="area" id="area" class="form-control" readonly>
                                </div>
                                <a href="{{ URL::previous() }}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
