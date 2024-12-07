@extends('layout.main-forms')

@section('title', 'Cadastre-se')

@section('content')
 
    <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data" class="form-signin text-center">
        @include('components.alert-success')
        @include('components.alert-error')
        <h2 class="mt-4">Cadastro</h2>
        
        @csrf

        <div class="form-group my-4 p-3 text-start">
            <label for="icone" class="text-muted small d-flex flex-column text-center">
                <div class="d-flex position-relative mx-auto">
                    <img src="/img/users/default.png" alt="Icone de usuario" id="preview" class="bg-secondary img-logo rounded-circle mx-auto">
                    <span class="position-absolute bottom-0 end-0"><i class="bi-camera-fill rounded-circle bg-light p-2"></i></span>
                </div>
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
            <input type="text" name="telefone" id="telefone" class="form-control">
            <label for="telefone">Insira seu número de telefone</label>
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

@endsection