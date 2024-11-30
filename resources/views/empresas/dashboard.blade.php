@extends('layout.main')

@section('title', 'Sua Empresa - Vagas Tucano')

@section('content')
    <a href="{{route('vaga.cadastro', $empresa->id)}}">Criar vaga</a>
    @foreach($vagas as $vaga)
        <p>{{$vaga->nome}}</p>
        <p>{{$vaga->tipo}}</p>
        <p>{{$vaga->descricao}}</p>
    @endforeach
@endsection