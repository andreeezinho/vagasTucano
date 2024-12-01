@extends('layout.main')

@section('title', 'Vagas Tucano')

@section('content')
    <div class="border">
        <p>{{$vaga->nome}}</p>
        <p>{{$vaga->tipo}}</p>
        <p>{{$vaga->descricao}}</p>
        @if($participa == true)
            <p>JA PARTICIPA DA VAGA</p>
        @else
            <form action="{{route('vaga.candidatar', $vaga->id)}}" method="post">
                @csrf
                <button type="submit">CANDIDATAR</button>
            </form>
        @endif
    </div>
@endsection

