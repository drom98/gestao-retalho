@extends('operario.layouts.app')

@section('content')
    <div class="row mb-3">
        <div class="col-md-8 themed-grid-col">
            <button type="button" class="btn btn-primary btn-lg btn-block">Ver retalho disponivel</button>
            <button type="button" class="btn btn-primary btn-lg btn-block">Inserir retalho</button>
        </div>
        <div class="col-md-4 themed-grid-col">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Retalho disponivel
                    <span class="badge badge-primary badge-pill">14</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Retalho usado
                    <span class="badge badge-primary badge-pill">2</span>
                </li>
            </ul>
        </div>
    </div>
@endsection
