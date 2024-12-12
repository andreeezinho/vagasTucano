@extends('layout.main')

@section('title', 'Vagas Tucano')

@section('content')
    <div class="border">
        <p>{{$vaga->nome}}</p>
        <p>{{$vaga->tipo}}</p>
        <p>{!! nl2br(e($vaga->descricao)) !!}</p>
        @if($participa == true)
            <p>JA PARTICIPA DA VAGA</p>
            <form action="{{route('vaga.sair', $vaga->id)}}" method="post">
                @csrf
                <button type="submit">SAIR DA VAGA</button>
            </form>
        @else
            <form action="{{route('vaga.candidatar', $vaga->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="curriculo" id="curriculo">
                <button type="submit">CANDIDATAR</button>
            </form>
        @endif
    </div>
@endsection

