@extends('admin.dashboard.layouts.app')

@section('content')

    @include('includes.modalUsarRetalho')

    @inject('data', 'App\Helpers\Helper');

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

    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bold">Retalho #{{ $retalho->id }}</h5>
                    <small>{{ $retalho->retalhable->name }}, {{ $data->getLocalizedDate($retalho) }}</small>
                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <a href="{{ route('etiqueta', $retalho->id) }}" target="_blank" style="justify-content: flex-start;" class="btn btn-sm btn-dark btn-icon-split"><span class="icon"><i class="fas fa-print"></i></span><span class="text"> Gerar etiqueta</span></a>
                            <button data-id="{{ $retalho->id }}" onclick="getRetalho({{ $retalho->id }})" style="justify-content: flex-start;" type="button" class="btn btn-sm btn-dark btn-icon-split" data-toggle="modal" data-target="#modalUsarRetalho"><span class="icon"><i class="fas fa-check"></i></span><span class="span text"> Usar</span></button>
                            <a href="/admin/retalho/{{ $retalho->id }}/edit" style="justify-content: flex-start;" class="btn btn-sm btn-dark btn-icon-split"><span class="icon"><i class="fas fa-edit"></i></span><span class="text"> Editar</span></a>
                            <button style="justify-content: flex-start;" class="btn btn-sm btn-danger btn-icon-split" onclick="fecthDelete({{ $retalho->id }}, '/admin/retalho/', 'DELETE')"><span class="icon"><i class="far fa-trash-alt"></i></span><span class="text"> Eliminar</span></button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <ul class="list-group">
                <li class="list-group-item"><strong class="d-inline-block w-50">Tipo de vidro: </strong><span class="text-right">{{ $retalho->tipoVidro->nome }}</span></li>
                <li class="list-group-item"><strong class="d-inline-block w-50">Comprimento: </strong><span class="text-right">{{ $retalho->comprimento }}</span></li>
                <li class="list-group-item"><strong class="d-inline-block w-50">Largura: </strong><span class="text-right">{{ $retalho->largura }}</span></li>
                <li class="list-group-item"><strong class="d-inline-block w-50">Área: </strong><span class="text-right">{{ $retalho->area }}</span></li>
                <li class="list-group-item"><strong class="d-inline-block w-50">Lote: </strong><span class="text-right">{{ $retalho->num_lote }}</span></li>
                <li class="list-group-item"><strong class="d-inline-block w-50">Utilizador: </strong><span class="text-right">{{ $retalho->retalhable->name }}</span></li>
                <li class="list-group-item"><strong class="d-inline-block w-50">Data arrumação: </strong><span class="text-right">{{ $data->getLocalizedDate($retalho) }}</span></li>
                <li class="list-group-item"><strong class="d-inline-block w-50">Local arrumação: </strong><span class="text-right">{{ $retalho->localizacao->nome }}</span></li>
            </ul>
        </div>
    </div>

@endsection
