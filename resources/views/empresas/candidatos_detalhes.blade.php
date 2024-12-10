@extends('layout.main')

@section('title','Empresas - Vagas Tucano')

@section('content')
    <div class="border">
        <p>{{$candidato->name}}</p>
        <p>{{$candidato->cpf}}</p>

        <!-- <iframe src="/vagas/curriculos/{{$curriculo}}" width="600" height="780" style="border: none;"></iframe> -->

        <embed src="/vagas/curriculos/{{$curriculo}}" width="760" height="500" type='application/pdf'>


        @if ($entrevistaMarcada == true)
            <form action="{{route('candidato.entrevista.remover', ['id' => $id, 'id_vaga' => $id_vaga, 'id_candidato' => $candidato->id, 'id_entrevista' => $id_entrevista])}}" method="post">
                @csrf
                @method('delete')
                <button type="submit">Desmarcar entrevista</button>
            </form>
        @else
            <a href="{{route('candidato.entrevista', ['id' => $id, 'id_vaga' => $id_vaga, 'id_candidato' => $candidato->id])}}">Aprovar candidato para entrevista</a>
        @endif
    </div>
@endsection