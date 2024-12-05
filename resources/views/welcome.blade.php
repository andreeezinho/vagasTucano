@extends('layout.main')

@section('title', 'Vagas Tucano')

@section('content')
    <div class="border">
        <form action="{{route('home')}}" method="get">
            <input type="text" name="search" id="search">
            <button type="submit"><i class="bi-search"></i></button>
        </form>
    </div>

    @if (count($vagas) > 0)
        @foreach($vagas as $vaga)
            <p>{{$vaga->nome}}</p>
            <p>{{$vaga->tipo}}</p>
            <p>{{$vaga->descricao}}</p>
            <a href="{{route('vaga.detalhes', $vaga->id)}}">Ver</a>
        @endforeach
    @else
        <h3>Vagas não encontradas</h3>
    @endif
@endsection

