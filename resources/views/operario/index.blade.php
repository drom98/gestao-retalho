@extends('operario.layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card mb-5 mt-4 py-2 border-left-primary shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <p class="font-weight-bold">Bem vindo:
                                <span class="font-weight-normal">{{ Auth::user()->name }} ({{ Auth::user()->username }})</span>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <a href="#" class="text-danger font-weight-bold" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Sair <i class="fas fa-sign-out-alt"></i>
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
