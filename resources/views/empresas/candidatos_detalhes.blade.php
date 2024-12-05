@extends('layout.main')

@section('title','Empresas - Vagas Tucano')

@section('content')
    <div class="border">
        <p>{{$candidato->name}}</p>
        <p>{{$candidato->cpf}}</p>
        @if ($entrevistaMarcada == true)
            <h1>JA TEM MARCADA</h1>
        @else
            <a href="{{route('candidato.entrevista', ['id' => $id, 'id_vaga' => $id_vaga, 'id_candidato' => $candidato->id])}}">Aprovar candidato para entrevista</a>
        @endif
    </div>
@endsection