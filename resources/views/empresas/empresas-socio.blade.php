@extends('layout.main')

@section('title', 'Empresas Parceiras - Vagas Tucano')

@section('content')
    <h2>Suas empresas</h2>
    @if (count($empresas) > 0)
        <div class="border">
            @foreach ($empresas as $empresa)
                <img src="/img/empresas/icones/{{$empresa->icone}}" alt="Icone empresa" class="img-logo">
                <p>{{$empresa->nome}}</p>
                <p>{{$empresa->descricao}}</p>
                <a href="{{route('empresas.dashboard', ["id" => $empresa->id])}}" class="btn btn-primary">Entrar</a>
                <a href="{{route('empresas.edit', ["id" => $empresa->id])}}" class="btn btn-success">Editar</a>
                <form action="{{route('empresas.destroy', ['id' => $empresa->id])}}" method="POST">
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            @endforeach
        </div>
    @else
        <h3>Não há empresas no momento</h3>
    @endif

@endsection