@extends('layout.main')

@section('title','Empresas - Vagas Tucano')

@section('content')
    <form action="{{route('empresas.store')}}" method="POST" enctype="multipart/form-data" class="d-flex flex-column">
        @csrf
        
        <input type="text" name="nome" id="nome">
        <textarea name="descricao" id="descricao"></textarea>
        <select name="status" id="status">
            <option value="Aberta">aberta</option>
            <option value="Fechada">Fechada</option>
        </select>
        <input type="text" name="tipo" id="tipo">
        <input type="text" name="telefone" id="telefone">
        <input type="date" name="data_fechamento" id="data_fechamento">

        <button type="submit">Confirmar</button>
    </form>
@endsection