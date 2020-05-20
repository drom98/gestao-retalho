@extends('operario.layout')

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-6">
            <div class="text-center">
                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 16rem;" src="{{ asset('assets/img/logo.png') }}" alt="">
                <h2 class="text-dark font-weight-bold">Cristalmax</h2>
                <p class="text-secondary">Utilizador: {{ Auth::user()->name }}</p>
            </div>
        </div>
    </div>
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
                            <a href="/retalho/create" class="btn btn-block btn-primary text-white">Insrerir retalho</a>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="#" class="btn btn-danger btn-icon-split" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <span class="icon text-white-50">
                                    <i class="fas fa-sign-out-alt"></i>
                                </span>
                                <span class="text">Sair</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
