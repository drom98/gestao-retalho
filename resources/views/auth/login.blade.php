@extends('admin.dashboard.layouts.login')

@section('content')
<div class="container">
    <form class="form-signin" method="POST" action="{{ route('admin.doLogin') }}">
        @csrf
        <img class="mb-4" src="{{ asset('assets/img/logo.png') }}" alt="" width="150">
        <h1 class="h3 font-weight-normal">Iniciar Sessão</h1>
        <small class="text-secondary">Area de administrador</small>
        <label for="username" class="sr-only">Utilizador</label>
        <input name="username" type="text" class="form-control form-control-user @error('username') is-invalid @enderror" value="{{ old('username') }}" required autocomplete="username" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Utilizador">
        @error('username')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Password" required autocomplete="current-password">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <!--
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        -->
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
    </form>
    <a class="mt-5 mb-3" href="{{ route('operario.login') }}">Ir para area de operario</a>
</div>
@endsection
