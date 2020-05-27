@extends('admin.dashboard.layouts.login')

@section('content')
<div class="container">
    @if (session('sucesso'))
        @include('includes.mensagemSucesso')
    @endif
    @if (session('erro'))
        @include('includes.mensagemErro')
    @endif
    <form class="form-signin" method="POST" action="{{ route('login') }}">
        @csrf
        <img class="mb-4" src="{{ asset('assets/img/logo.png') }}" alt="" width="160">
        <h4 class="font-weight-bold text-dark">Cristalmax</h4>
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
    <a class="mt-5" href="{{ route('admin.login') }}">Ir para a área de administrador</a>
</div>
@endsection
