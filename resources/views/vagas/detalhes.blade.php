@extends('layout.main')

@section('title', 'Vagas Tucano')

@section('content')

    <div class="container"> 
        <div class="row justify-content-center">
            <div class="text-muted mb-3">
                <img src="/img/empresas/icones/{{$vaga->empresa->icone}}" alt="Logo empresa" class="icone-user"> 
                {{$vaga->empresa->nome}}
            </div>

            <h2 class="border-bottom pb-3">
                {{$vaga->nome}}
                <a href="" class="btn btn-warning float-end">Candidatar-se <i class="bi-box-arrow-up-right"></i></a>
            </h2>

            <div class="mt-3">
                <h3 class="text-muted mb-3">Detalhes da vaga</h3>

                <div class="px-4">
                    <p class="text-muted my-3"><i class="bi-journal-medical"></i> Tipo da vaga: {{$vaga->tipo}}</p>
                    <p class="text-muted my-3"><i class="bi-{{$vaga->status == "Aberta" ? "check" : "exclamation-circle"}}"></i> Status: {{$vaga->status}}</p>
                    <p class="text-muted my-3"><i class="bi-clock-fill"></i> Criada em: {{date('d/m/Y', strtotime($vaga->created_at))}}</p>
                    <p class="text-muted my-3"><i class="bi-clock"></i> Válida até: {{date('d/m/Y', strtotime($vaga->data_fechamento))}}</p>
                </div>
                
                <h3 class="text-muted pb-2 pt-4">Descrição da vaga</h3>

                <div class="px-4 py-3 border">
                    <p class="text-muted">{{$vaga->descricao}}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="border">
        <p>{{$vaga->nome}}</p>
        <p>{{$vaga->tipo}}</p>
        <p>{!! nl2br(e($vaga->descricao)) !!}</p>
        @if($participa == true)
            <p>JA PARTICIPA DA VAGA</p>
            <form action="{{route('vaga.sair', $vaga->id)}}" method="post">
                @csrf
                <button type="submit">SAIR DA VAGA</button>
            </form>
        @else
            <form action="{{route('vaga.candidatar', $vaga->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="curriculo" id="curriculo">
                <button type="submit">CANDIDATAR</button>
            </form>
        @endif
    </div> --}}
@endsection

