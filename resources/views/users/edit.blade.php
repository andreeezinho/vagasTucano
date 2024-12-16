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
    
            <button type="button" data-toggle="modal" data-target="#modal" class="btn btn-danger mb-4"><i class="bi-trash"></i> Excluir</button>
            <button class="btn btn-dark mb-4"><i class="bi-pencil"></i> Editar</button>
        </form>

        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Deseja excluir a conta?</h5>
                    </div>

                    <div class="modal-body"></div>

                    <div class="modal-footer mx-auto">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                        <form action="{{route('user.destroy')}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"><i class="bi-trash"></i> Excluir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection