@extends('operario.layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary text-white">
                        <i class="fas fa-arrow-left"></i>
                        Voltar
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @include('includes.tabelaRetalho')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
