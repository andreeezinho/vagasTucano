@extends('layout.main-forms')

@section('title', 'Sua Empresa - Vagas Tucano')

@section('content')

<form action="{{route('candidato.aprovar', ['id' => $id, 'id_vaga' => $id_vaga, 'id_candidato' => $candidato->id])}}" method="POST" enctype="multipart/form-data" class="form-signin text-center">
    @include('components.alert-success')
    @include('components.alert-error')
    <div class="text-start mb-2">
        <a href="{{route('candidato.detalhes', ['id' => $id, 'id_vaga' => $id_vaga, 'id_candidato' => $candidato->id])}}" class="btn btn-secondary rounded-circle"><i class="bi-arrow-left"></i></a>
    </div>

    <h2 class="mt-4">Editar Entrevista</h2>
    <p class="text-muted mt-4 mb-2">
        <img src="/img/users/{{$entrevista->user->icone}}" alt="Icone usuário" class="icone-user rounded-circle">
        {{$entrevista->user->name}}
    </p>
    
    @csrf
    @method('PUT')

    <select name="status" class="form-select my-4" value="{{$entrevista->status}}">                       
        <option value="Confirmado">Confirmado</option>
        <option value="Pendente">Pendente</option>
    </select>

    <div class="form-floating my-4">                       
        <input type="date" name="data" id="data" class="form-control" value="{{$entrevista->data}}">
        <label for="data">Insira a data da entrevista</label>
    </div>

    <div class="form-floating my-4">                       
        <input type="text" name="hora" id="hora" class="form-control" value="{{$entrevista->hora}}">
        <label for="hora">Insira a hora da entrevista</label>
    </div>

    <div class="form-floating my-4">                       
        <input type="text" name="local" id="local" class="form-control" value="{{$entrevista->local}}">
        <label for="local">Insira o local da entrevista</label>
    </div>

    <button class="btn btn-dark mb-4">Confirmar</button>
</form>

    {{-- <div class="border">
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
    </div> --}}
@endsection