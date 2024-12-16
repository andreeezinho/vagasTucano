@extends('layout.main')

@section('title', 'Vagas Tucano')

@section('content')

    <div class="container">
        <div class="row">

            <div class="text-center border-bottom p-3">
                <h3>Vagas</h3>
                <p class="text-muted">Encontre todas as vagas do nosso site aqui</p>
            </div>

            @if (count($vagas) > 0)
                
                @foreach ($vagas as $vaga)
                    <div class="col-12 mx-auto my-4 border py-3">
                        <h4>
                            <img src="/img/empresas/icones/{{$vaga->empresa->icone}}" alt="Icone da empresa" class="img-logo rounded-circle">
                            {{$vaga->nome}}
                        </h4>

                        <p class="text-muted my-3"><i class="bi-journal-medical"></i> Tipo da vaga: {{$vaga->tipo}}</p>
                        <p class="text-muted my-3"><i class="bi-{{$vaga->status == "Aberta" ? "check" : "exclamation-circle"}}"></i> Status: {{$vaga->status}}</p>
                        <p class="text-muted my-3"><i class="bi-clock"></i> Válida até: {{date('d/m/Y', strtotime($vaga->data_fechamento))}}</p>
                        <a href="{{route('vaga.detalhes', $vaga->id)}}" class="btn btn-warning">Ver mais <i class="bi-box-arrow-in-up-right"></i></a>
                    </div>
                @endforeach
            @else
                <h4 class="text-muted">Não há vagas, por enquanto</h4>
            @endif
        </div>
    </div>

@endsection