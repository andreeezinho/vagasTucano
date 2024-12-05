@extends('layout.main')

@section('title','Empresas - Vagas Tucano')

@section('content')
    <div class="border">
        <p>{{$candidato->name}}</p>
        <p>{{$candidato->cpf}}</p>
        @if ($entrevistaMarcada == true)
            <form action="{{route('candidato.entrevista.remover', ['id' => $id, 'id_vaga' => $id_vaga, 'id_candidato' => $candidato->id])}}" method="post">
                @csrf
                @method('delete')
                <button type="submit">Desmarcar entrevista</button>
            </form>
        @else
            <a href="{{route('candidato.entrevista', ['id' => $id, 'id_vaga' => $id_vaga, 'id_candidato' => $candidato->id])}}">Aprovar candidato para entrevista</a>
        @endif
    </div>
@endsection