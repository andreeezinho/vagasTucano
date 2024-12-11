@extends('layout.main')

@section('title', 'Empresas Parceiras - Vagas Tucano')

@section('content')

    <h2>{{$empresa->nome}}</h2>

    <div class="border">
        <p>{{$empresa->descricao}}</p>
    </div>

@endsection