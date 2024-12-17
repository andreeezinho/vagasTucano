@extends('layout.main-forms')

@section('title', 'Marcar Entrevista - Vagas Tucano')

@section('content')

    <form action="{{route('candidato.aprovar', ['id' => $id, 'id_vaga' => $id_vaga, 'id_candidato' => $candidato->id])}}" method="POST" enctype="multipart/form-data" class="form-signin text-center">
        @include('components.alert-success')
        @include('components.alert-error')
        <div class="text-start mb-2">
            <a href="{{route('candidato.detalhes', ['id' => $id, 'id_vaga' => $id_vaga, 'id_candidato' => $candidato->id])}}" class="btn btn-secondary rounded-circle"><i class="bi-arrow-left"></i></a>
        </div>

        <h2 class="mt-4">Marcar Entrevista</h2>
        
        @csrf

        <select name="status" class="form-select my-4">                       
            <option selected >Selecione o status da vaga</option>
            <option value="Confirmado">Confirmado</option>
            <option value="Pendente">Pendente</option>
        </select>

        <div class="form-floating my-4">                       
            <input type="date" name="data" id="data" class="form-control">
            <label for="data">Insira a data da entrevista</label>
        </div>

        <div class="form-floating my-4">                       
            <input type="text" name="hora" id="hora" class="form-control">
            <label for="hora">Insira a hora da entrevista</label>
        </div>

        <div class="form-floating my-4">                       
            <input type="text" name="local" id="local" class="form-control">
            <label for="local">Insira o local da entrevista</label>
        </div>

        <button class="btn btn-dark mb-4">Confirmar</button>
    </form>
    
@endsection