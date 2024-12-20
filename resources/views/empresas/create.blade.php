@extends('layout.main-forms')

@section('title', 'Cadastrar Empresa - Vagas Tucano')

@section('content')
 
    <form action="{{route('empresas.store')}}" method="POST" enctype="multipart/form-data" class="form-signin text-center" style="margin-top: 70px">
        @include('components.alert-success')
        @include('components.alert-error')
        
        <h2 class="mt-4"><i class="bi-building-fill"></i> Cadastro</h2>
        <p class="small text-muted">Cadastre sua empresa no nosso site</p>
        
        @csrf

        <div class="form-group my-4 p-3 text-start">
            <label for="icone" class="text-muted small d-flex flex-column text-center">
                <div class="d-flex position-relative mx-auto">
                    <img src="/img/empresas/default.png" alt="Icone de usuario" id="preview" class="bg-secondary img-logo rounded-circle mx-auto">
                    <span class="position-absolute bottom-0 end-0"><i class="bi-camera-fill rounded-circle bg-light p-2"></i></span>
                </div>
                Insira o logo da empresa
            </label>

            <input type="file" name="icone" id="icone" class="d-none">
        </div>

        <div class="form-floating">
            <input type="file" name="banner" id="banner" class="form-control">
            <label for="banner">Insira o banner da empresa</label>
        </div>

        <div class="form-floating my-4">                       
            <input type="text" name="nome" id="nome" class="form-control">
            <label for="nome">Insira o nome da empresa</label>
        </div>

        <div class="form-floating my-4">                       
            <input type="text" name="cnpj" id="cnpj" class="form-control">
            <label for="cnpj">Insira o cnpj da empresa</label>
        </div>

        <div class="form-floating my-4">                       
            <input type="text" name="telefone" id="telefone" class="form-control">
            <label for="telefone">Insira o número de telefone</label>
        </div>

        <div class="form-floating my-4">                       
            <input type="text" name="endereco" id="endereco" class="form-control">
            <label for="endereco">Insira o endereco da empresa</label>
        </div>

        <textarea class="border text-muted small" name="descricao" id="descricao" cols="35" rows="10" placeholder="Insira uma descrição da empresa"></textarea>

        <button class="btn btn-dark mb-4">Confirmar</button>
    </form>

@endsection
            


{{-- <input type="file" name="icone" id="icone">
<input type="file" name="banner" id="banner">
<input type="text" name="nome" id="nome">
<input type="text" name="cnpj" id="cnpj">
<input type="text" name="endereco" id="endereco">
<input type="text" name="telefone" id="telefone">
<textarea name="descricao" id="descricao"></textarea> --}}
