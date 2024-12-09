@extends('layout.main')

@section('title', 'Empresas Parceiras - Vagas Tucano')

@section('content')
    <h2>Empresas parceiras</h2>
    @if (count($empresas) > 0)
        <div class="border">
            @foreach ($empresas as $empresa)
                <img src="/img/empresas/icones/{{$empresa->icone}}" alt="Icone empresa" class="img-logo">
                <p>{{$empresa->nome}}</p>
                <p>{{$empresa->descricao}}</p>
                <a href="{{route('empresas.detalhes', ["id" => $empresa->id])}}">Ver mais</a>
            @endforeach
        </div>
    @else
        <h3>Não há empresas no momento</h3>
    @endif

@endsection