@extends('layout.main')

@section('title', 'Sua Empresa - Vagas Tucano')

@section('content')
    <a href="{{route('vaga.cadastro', $empresa->id)}}">Criar vaga</a>
    @foreach ($vagas as $vaga)
        <div class="border">
            <p>{{$vaga->nome}}</p>
            <p>{{$vaga->descricao}}</p>
            <p>{{$vaga->tipo}}</p>
            <a href="{{route('vaga.candidatos', ['id' => $empresa->id, 'id_vaga' => $vaga->id])}}">Ver candidatos</a>
        </div>
    @endforeach
@endsection