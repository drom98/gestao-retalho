@extends('operario.layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <a href="{{ url()->previous() }}" class="btn btn-sm btn-dark text-white">
                                <i class="fas fa-arrow-left"></i>
                                Voltar
                            </a>
                        </div>
                        <div class="col">
                            <h6 class="font-weight-bold text-primary text-center">Inserir retalho</h6>
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @include('includes.adicionarRetalho')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
