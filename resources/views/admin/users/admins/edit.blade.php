@extends('admin.dashboard.layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Editar administrador</h1>

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
                    {{ $admin->name }}
                </div>
                <div class="card-body">
                    <form class="user" method="POST" action="{{ route('admin.administrador.update', $admin->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input name="nome" id="nome" type="text" class="form-control" placeholder="Nome" value="{{ $admin->name }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input name="email" id="email" type="email" class="form-control" placeholder="Email" value="{{ $admin->email }}">
                        </div>
                        <div class="form-group">
                            <label for="username">Nome de utilizador:</label>
                            <input name="username" id="username" type="text" class="form-control" placeholder="Nome de utilizador" value="{{ $admin->username }}">
                            <small id="username" class="form-text text-muted">
                                O nome de utilizador será usado para iniciar sessão.
                            </small>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="password_old" value="{{ $admin->password }}">
                            <label for="password">Password:</label>
                            <input name="password" id="password" type="password" class="form-control" placeholder="Password">
                        </div>
                        <a href="{{ URL::previous() }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/main.js') }}"></script>
@endsection
