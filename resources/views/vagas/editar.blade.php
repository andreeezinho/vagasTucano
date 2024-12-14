@extends('layout.main')

@section('title','Empresas - Vagas Tucano')

@section('content')
    <div class="container">
        <form action="{{route('vaga.update', ['id' => $vaga->empresa->id, 'id_vaga' => $vaga->id])}}" method="POST" class="d-flex flex-column">
            @csrf
            @method('PUT')
    
            <input type="text" name="nome" id="nome" value="{{$vaga->nome}}">
            <textarea name="descricao" id="descricao">{{$vaga->descricao}}</textarea>
            <select name="status" id="status" value="{{$vaga->status}}">
                <option value="Aberta">aberta</option>
                <option value="Fechada">Fechada</option>
            </select>
            <input type="text" name="tipo" id="tipo" value="{{$vaga->tipo}}">
            <input type="date" name="data_fechamento" id="data_fechamento" value="{{$vaga->data_fechamento}}">
    
            <button type="submit">Confirmar</button>
        </form>    
    </div>
@endsection