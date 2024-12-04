@extends('layout.main')

@section('title', 'Sua Empresa - Vagas Tucano')

@section('content')
    <div class="border">
        <p>Candidato: {{$candidato->name}}</p>
        <form action="{{route('candidato.aprovar', ['id' => $id, 'id_vaga' => $id_vaga, 'id_candidato' => $candidato->id])}}" method="POST">
            @csrf
            <select name="status" id="status">
                <option value="Confirmado">Confirmado</option>
                <option value="Pendente">Pendente</option>
            </select>

            <input type="date" name="data" id="data">
            <input type="text" name="hora" id="hora">
            <input type="text" name="local" id="local">
            <button type="submit">Confirmar</button>
        </form>
    </div>
@endsection