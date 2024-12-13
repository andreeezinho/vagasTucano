@extends('layout.main')

@section('title', 'Empresas Parceiras - Vagas Tucano')

@section('content')

    <div class="d-flex bg-dark text-light text-center position-relative">
        <img src="/img/empresas/banners/{{$empresa->banner}}" alt="Banner empresa" class="banner-empresa">
        <h3 class="position-absolute icone-banner">
            <img src="/img/empresas/icones/{{$empresa->icone}}" alt="Icone empresa" class="rounded-circle border border-light border-3 img-empresas">
            {{$empresa->nome}}
        </h3>
    </div>

    <div class="container mt-5">
        <div class="row">
            <h3 class="text-muted">Informações da empresa</h3>
            <p class="ms-2 my-4 text-muted"><i class="bi-building-fill"></i> Endereço: {{$empresa->endereco}}</p>
            <p class="ms-2 my-4 text-muted"><i class="bi-telephone-fill"></i> Endereço: {{$empresa->telefone}}</p>

            <h5 class="text-muted mt-4">Descrição da empresa</h5>
            <div class="border p-3">
                <p>{!! nl2br($empresa->descricao) !!}</p>
            </div>
        </div>

        <div class="row mt-5">
            <h3 class="text-muted mt-5">Vagas da empresa</h3>
            @if (count($empresa->vagas) > 0)
                
                @foreach ($empresa->vagas as $vaga)
                    <div class="col-12 my-4 border py-3">
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
                <span class="text-muted mt-3">Não há vagas, por enquanto</span>
            @endif
        </div>
    </div>

@endsection