@extends('layout.main-forms')

@section('title', 'Cadastre-se')

@section('content')
 
    <div class="form-signin text-center mt-5">
        <form action="{{route('user.update')}}" method="POST" enctype="multipart/form-data" >
            @include('components.alert-success')
            @include('components.alert-error')
            <h2 class="mt-4">Seu perfil</h2>
            
            @csrf
            @method('PUT')
    
            <div class="form-group my-4 p-3 text-start">
                <label for="icone" class="text-muted small d-flex flex-column text-center">
                    <div class="d-flex position-relative mx-auto">
                        <img src="/img/users/{{$user->icone ?? "default.png"}}" alt="Icone de usuario" id="preview" class="bg-secondary img-logo rounded-circle mx-auto">
                        <span class="position-absolute bottom-0 end-0"><i class="bi-camera-fill rounded-circle bg-light p-2"></i></span>
                    </div>
                    Insira uma foto de perfil
                </label>
    
                <input type="file" name="icone" id="icone" class="d-none">
            </div>
    
            <div class="form-floating my-4">                       
                <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
                <label for="name">Seu nome</label>
            </div>
    
            <div class="form-floating my-4">                       
                <input type="text" name="cpf" id="cpf" class="form-control" value="{{$user->cpf}}">
                <label for="cpf">Seu CPF</label>
            </div>
    
            <div class="form-floating my-4">                       
                <input type="text" name="telefone" id="telefone" class="form-control" value="{{$user->telefone}}">
                <label for="telefone">Número de telefone</label>
            </div>
    
            <div class="form-floating my-4">                       
                <input type="text" name="email" id="email" class="form-control" value="{{$user->email}}">
                <label for="email">Seu email</label>
            </div>
    
            <div class="form-floating my-4">                       
                <input type="password" name="password" id="password" class="form-control">
                <label for="password">Edite sua senha</label>
            </div>
    
            <button class="btn btn-dark mb-4">Confirmar</button>
        </form>

        <div class="border border-danger mt-5 p-3">
            <form action="{{route('user.destroy')}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Deletar conta</button>
            </form>
        </div>
    </div>

    

@endsection