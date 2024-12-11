@extends('layout.main')

@section('title','Editar Empresa - Vagas Tucano')

@section('content')
    <form action="{{route('empresas.update', $empresa->id)}}" method="POST" enctype="multipart/form-data" class="d-flex flex-column">
        @csrf
        @method('PUT')
        
        <input type="file" name="icone" id="icone">
        <input type="file" name="banner" id="banner">
        <input type="text" name="nome" id="nome" value="{{$empresa->nome}}">
        <input type="text" name="cnpj" id="cnpj" value="{{$empresa->cnpj}}">
        <input type="text" name="endereco" id="endereco" value="{{$empresa->endereco}}">
        <input type="text" name="telefone" id="telefone" value="{{$empresa->telefone}}">
        <textarea name="descricao" id="descricao">{{$empresa->descricao}}</textarea>

        <button type="submit">Confirmar</button>
    </form>
@endsection