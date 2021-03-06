@extends('admin.dashboard.layouts.app')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-5 text-dark">Gestão de retalho</h1>
            <p class="lead">Área de administração</p>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-4 col-md-12 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Retalho disponível</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $qtRetalho}}</div>
                            <br>
                            <a href="{{ route('admin.retalho.index') }}" class="btn btn-secondary btn-sm">Consultar</a>
                            <a href="{{ route('admin.retalho.create') }}" class="btn btn-secondary btn-sm">Adicionar</a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-layer-group fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-12 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Retalho usado</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $qtRetalhoUsado }}</div>
                            <br>
                            <a href="{{ route('admin.usado.index') }}" class="btn btn-secondary btn-sm">Ver retalho usado</a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box-open fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-12 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Localizações</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $qtLocalizacoes }}</div>
                            <br>
                            <a href="{{ route('admin.localizacao.index') }}" class="btn btn-secondary btn-sm">Ver localizações</a>
                            <a href="{{ route('admin.localizacao.create') }}" class="btn btn-secondary btn-sm">Adicionar</a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-search-location fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5 mb-4">

        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header text-primary font-weight-bold">
                    {{ $chartRetalhosPorTipoVidro->options['chart_title'] }}
                </div>
                <div class="card-body">
                    {!! $chartRetalhosPorTipoVidro->renderHtml() !!}
                    {!! $chartRetalhosPorTipoVidro->renderChartJsLibrary() !!}
                    {!! $chartRetalhosPorTipoVidro->renderJs() !!}
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header text-primary font-weight-bold">
                    {{ $chartRetalhosPorLocalizacao->options['chart_title'] }}
                </div>
                <div class="card-body">
                    {!! $chartRetalhosPorLocalizacao->renderHtml() !!}
                    {!! $chartRetalhosPorLocalizacao->renderJs() !!}
                </div>
            </div>
        </div>


    </div>
@endsection
