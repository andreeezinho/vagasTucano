@extends('layout.main')

@section('title', 'Sua Empresa - Vagas Tucano')

@section('content')
    <a href="{{route('vaga.cadastro', $empresa->id)}}">Criar vaga</a>
    @foreach ($vagas as $vaga)
        <div class="border">
            <p>{{$vaga->nome}}</p>
            <p>{{$vaga->descricao}}</p>
            <p>{{$vaga->tipo}}</p>
            <a href="{{route('vaga.candidatos', ['id' => $empresa->id, 'id_vaga' => $vaga->id])}}">Ver candidatos</a>
            <a href="{{route('vaga.entrevistas', ['id' => $empresa->id, 'id_vaga' => $vaga->id])}}">Ver entrevistas</a>
            <a href="{{route('vaga.editar', ['id' => $empresa->id, 'id_vaga' => $vaga->id])}}" class="btn btn-primary">Editar</a>
            <form action="{{route('vaga.delete', ['id' => $empresa->id, 'id_vaga' => $vaga->id])}}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-danger">Excluir</button>
            </form>
        </div>
    @endforeach
@endsection