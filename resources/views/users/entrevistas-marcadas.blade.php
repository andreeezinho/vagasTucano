@extends('layout.main')

@section('title', 'Vagas Tucano')

@section('content')
    @if(count($entrevistas) > 0)
        @foreach ($entrevistas as $entrevista)
            <div class="border">
                <p>Vaga: {{$entrevista->vaga->nome}}</p>
                <p>Empresa: {{$entrevista->vaga->empresa->nome}}</p>
                <p>{{$entrevista->status}}</p>
                <p>{{$entrevista->data}}</p>
                <p>{{$entrevista->hora}}</p>
                <p>{{$entrevista->local}}</p>
            </div>
        @endforeach
    @else
        <h2>Você não tem entrevistas marcadas</h2>
    @endif
@endsection

