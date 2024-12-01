@extends('layout.main')

@section('title', 'Vagas Tucano')

@section('content')
    @foreach($vagas as $vaga)
        <p>{{$vaga->nome}}</p>
        <p>{{$vaga->tipo}}</p>
        <p>{{$vaga->descricao}}</p>
        <a href="{{route('vaga.detalhes', $vaga->id)}}">Ver</a>
    @endforeach
@endsection

