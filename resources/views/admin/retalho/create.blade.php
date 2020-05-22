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
                        <form class="user" method="POST" action="/admin/retalho">
                            @csrf
                            @include('includes.adicionarRetalho')
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
