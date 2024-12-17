@extends('layout.main')

@section('title','Candidatos - Vagas Tucano')

@section('content')

    <div class="container">
        <div class="mb-2">
            <a href="{{route('empresas.dashboard', $id)}}" class="btn btn-secondary rounded-circle"><i class="bi-arrow-left"></i></a>
        </div>

        <div class="row">
            <h3 class="border-bottom pb-2">
                <img src="/img/empresas/icones/{{$vaga->empresa->icone}}" alt="Icone empresa" class="rounded-circle border border-light border-3 img-empresas">
                {{$vaga->nome}}
            </h3>

            <h4 class="text-center my-3">Candidatos</h4>

            @if(count($candidatos) > 0)
                @foreach ($candidatos as $candidato)
                    <div class="col-12 mx-auto my-4 border py-3 px-3">
                        <h4>{{$vaga->nome}}</h4>
        
                        <p class="text-muted my-3"><i class="bi-person"></i> Nome: {{$candidato->name}}</p>
                        <p class="text-muted my-3"><i class="bi-card-text"></i> CPF: {{$candidato->cpf}}</p>
                        <p class="text-muted my-3"><i class="bi-mailbox"></i> Email: {{$candidato->email}}</p>
                    
                        <a href="{{route('candidato.detalhes', ['id' => $id, 'id_vaga' => $vaga->id, 'id_candidato' => $candidato->id])}}" class="btn btn-warning"><i class="bi-eye-fill"></i> Ver mais</a>
                    </div>
                @endforeach
            @else
                <p class="text-muted">Não há candidatos nessa vaga</p>
            @endif
        </div>
    </div>
@endsection