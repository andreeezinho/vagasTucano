@extends('layout.main')

@section('title','Empresas - Vagas Tucano')

@section('content')
    <form action="{{route('empresas.store')}}" method="POST" enctype="multipart/form-data" class="d-flex flex-column">
        @csrf
        
        <input type="file" name="icone" id="icone">
        <input type="file" name="banner" id="banner">
        <input type="text" name="nome" id="nome">
        <input type="text" name="cnpj" id="cnpj">
        <input type="text" name="endereco" id="endereco">
        <input type="text" name="telefone" id="telefone">
        <textarea name="descricao" id="descricao"></textarea>

        <button type="submit">Confirmar</button>
    </form>
@endsection