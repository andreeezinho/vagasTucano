@extends('layout.main')

@section('title', 'Vagas Tucano')

@section('content')
    @if (count($vagas) > 0)
        <div class="border">
            @foreach ($vagas as $vaga)
                <p>{{$vaga->nome}}</p>
                <p>{{$vaga->tipo}}</p>
                <p>{{$vaga->descricao}}</p>
                <a href="{{route('vaga.detalhes', $vaga->id)}}">Ver</a>
            @endforeach
        </div>
    @else
        <h3>Não há vagas no momento</h3>
    @endif

@endsection