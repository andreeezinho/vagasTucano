@extends('layout.main')

@section('title', 'Vagas Tucano')

@section('content')

    <div class="container">
        <div class="row">

            <div class="text-center p-3">
                <h3>Suas vagas</h3>
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
                        <form action="{{route('vaga.sair', $vaga->id)}}" method="POST">
                            @csrf
                        <button type="submit" class="btn btn-secondary my-2"><i class="bi-box-arrow-left"></i> Sair da vaga</button>
                        </form>
                    </div>
                @endforeach
            @else
                <h4 class="text-muted">Não há vagas, por enquanto</h4>
            @endif
        </div>
    </div>


    {{-- @if (count($vagas) > 0)
        <div class="border">
            @foreach ($vagas as $vaga)
                <p>{{$vaga->nome}}</p>
                <p>{{$vaga->tipo}}</p>
                <p>{{$vaga->descricao}}</p>
                <a href="{{route('vaga.detalhes', $vaga->id)}}">Ver</a>
            @endforeach
        </div>
    @else
        <h3>Não há vagas no momento</h3>
    @endif --}}

@endsection