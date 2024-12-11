@extends('layout.main')

@section('title', 'Sua Empresa - Vagas Tucano')

@section('content')
    <div class="border">
        <p>Candidato: {{$candidato->name}}</p>
        <form action="{{route('entrevista.update', ['id' => $id, 'id_vaga' => $id_vaga, 'id_candidato' => $candidato->id, 'id_entrevista' => $entrevista->id])}}" method="POST">
            @csrf
            @method('PUT')
            <select name="status" id="status" value="{{$entrevista->status}}">
                <option value="Confirmado">Confirmado</option>
                <option value="Pendente">Pendente</option>
            </select>

            <input type="date" name="data" id="data" value="{{$entrevista->data}}">
            <input type="text" name="hora" id="hora" value="{{$entrevista->hora}}">
            <input type="text" name="local" id="local" value="{{$entrevista->local}}">
            <button type="submit">Editar</button>
        </form>
    </div>
@endsection