@extends('layout.main')

@section('title','Empresas - Vagas Tucano')

@section('content')
    <div class="border">
        <p>{{$candidato->name}}</p>
        <p>{{$candidato->cpf}}</p>
        <a href="{{route('candidato.aprovar', ['id' => $id, 'id_vaga' => $id_vaga, 'id_candidato' => $candidato->id])}}">Aprovar candidato para entrevista</a>
    </div>
@endsection