@extends('layout.main')

@section('title', 'Vagas Tucano')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h3 class="py-3">Suas Entrevistas</h3>
                <p class="text-muted small">Vagas em que você foi aprovado para entrevista</p>
            </div>

            @if(count($entrevistas) > 0)
                @foreach ($entrevistas as $entrevista)
                    <div class="col-12 mx-auto my-4 border py-3">
                        <h4>
                            <img src="/img/empresas/icones/{{$entrevista->vaga->empresa->icone}}" alt="Icone da empresa" class="img-logo rounded-circle">
                            {{$entrevista->vaga->nome}}
                        </h4>

                        <div class="px-4 my-4">
                            <p class="text-muted my-2"><i class="bi-building"></i> Local: {{$entrevista->local}}</p>
                            <p class="text-muted my-2"><i class="bi-calendar-week"></i> Data: {{date('d/m/y', strtotime($entrevista->data))}}</p>
                            <p class="text-muted my-2"><i class="bi-clock"></i> Horário: {{date('h:m', strtotime($entrevista->hora))}}</p>
                            <p class="text-muted my-2"><i class="bi-{{$entrevista->status == "Confirmado" ? "check" : "exclamation-circle"}}"></i> Status: {{$entrevista->status}}</p>
                        </div>
                        
                        <p class="my-3 ms-3">Entrevista marcada em: {{date('d/m/y - h:m', strtotime($entrevista->created_at))}}</p>
                    </div>
                @endforeach
            @else   
                <h4>Não há entrevistas por enquanto</h4>
            @endif
        </div>
    </div>


    {{-- @if(count($entrevistas) > 0)
        @foreach ($entrevistas as $entrevista)
            <div class="border">
                <p>Vaga: {{$entrevista->vaga->nome}}</p>
                <p>Empresa: {{$entrevista->vaga->empresa->nome}}</p>
                <p>{{$entrevista->status}}</p>
                <p>{{$entrevista->data}}</p>
                <p>{{$entrevista->hora}}</p>
                <p>{{$entrevista->local}}</p>
            </div>
        @endforeach
    @else
        <h2>Você não tem entrevistas marcadas</h2>
    @endif --}}
@endsection

