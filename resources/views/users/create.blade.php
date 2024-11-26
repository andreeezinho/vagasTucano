@extends('layout.main')

@section('title', 'Cadastre-se')

@section('content')

    <div class="row justify-content-center">
        <div class="card col-11 col-md-8 col-lg-6 py-2 text-center">
            <h2 class="mt-4">Cadastro</h2>

            <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group my-4 p-3 text-start">
                    <label for="icone" class="text-muted small d-flex flex-column text-center">
                        <img src="/img/users/default.png" alt="Icone de usuario" id="preview" class="bg-secondary img-logo rounded-circle mx-auto">
                        Insira uma foto de perfil
                    </label>

                    <input type="file" name="icone" id="icone" class="d-none">
                </div>

                <div class="form-floating my-4">                       
                    <input type="text" name="name" id="name" class="form-control">
                    <label for="name">Insira seu nome completo</label>
                </div>

                <div class="form-floating my-4">                       
                    <input type="text" name="cpf" id="cpf" class="form-control">
                    <label for="cpf">Insira seu CPF</label>
                </div>

                <div class="form-floating my-4">                       
                    <input type="text" name="email" id="email" class="form-control">
                    <label for="email">Insira seu email</label>
                </div>

                <div class="form-floating my-4">                       
                    <input type="password" name="password" id="password" class="form-control">
                    <label for="password">Crie uma senha</label>
                </div>

                <button class="btn btn-dark mb-4">Confirmar</button>
            </form>
        </div>
    </div>

@endsection