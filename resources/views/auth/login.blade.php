@extends('layout.main')

@section('title', 'Login - Vagas Tucano')

@section('content')



    <div class="row justify-content-center">
        <div class="card col-11 col-md-8 col-lg-6 py-2 text-center">
            <img src="/img/logo.png" alt="Logo Vagas Tucano" class="img-logo mx-auto bg-dark rounded-circle my-3">
            <h2 class="mt-4">Login</h2>

            <form action="{{route('login')}}" method="POST">
                @csrf

                <div class="form-floating my-4">                       
                    <input type="text" name="email" id="email" class="form-control">
                    <label for="email">Insira seu email</label>
                </div>

                <div class="form-floating my-4">                       
                    <input type="password" name="password" id="password" class="form-control">
                    <label for="password">Insira sua senha</label>
                </div>

                <div class="d-flex mb-4">
                    <input type="checkbox" name="remember" id="remember" class="mx-2">
                    <label for="remember" class="text-muted small">Continuar conectado</label>
                </div>

                <button class="btn btn-dark mb-4">Confirmar</button>

                <a href="{{route('users.create')}}" class="my-3 text-muted small d-block">Não possui conta? Crie aqui</a>
            </form>
        </div>
    </div>

@endsection