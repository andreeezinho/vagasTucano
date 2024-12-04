@extends('layout.main')

@section('title','Empresas - Vagas Tucano')

@section('content')
    <div class="border">
        @foreach ($candidatos as $candidato)
            <p>{{$candidato->name}}</p>
            <p>{{$candidato->cpf}}</p>
            <a href="{{route('candidato.detalhes', ['id' => $id, 'id_vaga' => $id_vaga, 'id_candidato' => $candidato->id])}}">Ver mais</a>
        @endforeach
    </div>
@endsection