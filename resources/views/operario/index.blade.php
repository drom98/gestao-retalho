@extends('operario.layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="/retalho" class="btn btn-block btn-primary text-white">Consultar retalho</a>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="/retalho/create" class="btn btn-block btn-primary text-white">Inserir retalho</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
