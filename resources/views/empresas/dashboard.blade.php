@extends('layout.main')

@section('title', 'Sua Empresa - Vagas Tucano')

@section('content')
    <a href="{{route('vaga.cadastro', $empresa->id)}}">Criar vaga</a>

@endsection