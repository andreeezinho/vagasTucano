@extends('layout.main')

@section('title', 'Sua Empresa - Vagas Tucano')

@section('content')
    @if (count($entrevistas) > 0)
        @foreach ($entrevistas as $entrevista)
            <div class="border">
                <p>{{$entrevista->user->name}}</p>
                <p>{{$entrevista->status}}</p>
                <p>{{$entrevista->data}}</p>
                <p>{{$entrevista->hora}}</p>
                <p>{{$entrevista->local}}</p>
                <form action="{{route('candidato.entrevista.remover', [
                                    'id' => $id, 'id_vaga' => $entrevista->vaga->id, 'id_candidato' => $entrevista->user->id, 'id_entrevista' => $entrevista->id
                                        ])}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit">Desmarcar entrevista</button>
                </form>
            </div>
        @endforeach
    @else
        <h3>Não há entrevistas para essa vaga</h3>
    @endif    
@endsection