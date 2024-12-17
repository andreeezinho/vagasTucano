@extends('layout.main')

@section('title', 'Entrevistas Marcadas - Vagas Tucano')

@section('content')

    <div class="container">
        <div class="mb-2">
            <a href="{{route('empresas.dashboard', $id)}}" class="btn btn-secondary rounded-circle"><i class="bi-arrow-left"></i></a>
        </div>

        <div class="row">
            <div class="text-center my-4">
                <h3 class="text-center mb-4">{{$vaga->nome}}</h3>
                <h4 class="text-muted">Entrevistas marcadas</h4>
            </div>

            @if(count($entrevistas) > 0)
                @foreach ($entrevistas as $entrevista)
                    <div class="col-12 mx-auto my-4 border py-3 px-3">
                        <h4>
                            <img src="/img/users/{{$entrevista->user->icone}}" alt="Icone usuário" class="rounded-circle border border-3" style="width: 70px">
                            {{$entrevista->user->name}}
                        </h4>
        
                        <p class="text-muted my-3"><i class="bi-{{$entrevista->status == "Confirmado" ? "check" : "exclamation-circle"}}"></i> Status: {{$entrevista->status}}</p>
                        <p class="text-muted my-3"><i class="bi-calendar-week"></i> Data: {{$entrevista->data}}</p>
                        <p class="text-muted my-3"><i class="bi-clock"></i> Hora: {{$entrevista->hora}}</p>
                    
                        <form action="{{route('candidato.entrevista.remover', [
                                    'id' => $id, 'id_vaga' => $entrevista->vaga->id, 'id_candidato' => $entrevista->user->id, 'id_entrevista' => $entrevista->id
                                        ])}}" method="post">
                            @csrf
                            @method('delete')
                            <a href="{{route('entrevista.edit', ['id' => $id, 'id_vaga' => $entrevista->vaga->id, 'id_candidato' => $entrevista->user->id, 'id_entrevista' => $entrevista->id])}}" class="btn btn-primary"><i class="bi-pencil"></i> Editar</a>
                            <button type="submit" class="btn btn-danger"><i class="bi-slash-circle"></i> Cancelar</button>
                        </form>
                    </div>
                @endforeach
            @else
                <p class="text-muted">Não há candidatos nessa vaga</p>
            @endif
        </div>
    </div>

    {{-- @if (count($entrevistas) > 0)
        @foreach ($entrevistas as $entrevista)
            <div class="border">
                <p>{{$entrevista->user->name}}</p>
                <p>{{$entrevista->status}}</p>
                <p>{{$entrevista->data}}</p>
                <p>{{$entrevista->hora}}</p>
                <p>{{$entrevista->local}}</p>
                <form action="{{route('candidato.entrevista.remover', [
                                    'id' => $id, 'id_vaga' => $entrevista->vaga->id, 'id_candidato' => $entrevista->user->id, 'id_entrevista' => $entrevista->id
                                        ])}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit">Remover entrevista</button>
                </form>
                <a href="{{route('entrevista.edit', [
                        'id' => $id, 'id_vaga' => $entrevista->vaga->id, 'id_candidato' => $entrevista->user->id, 'id_entrevista' => $entrevista->id
                    ])}}" class="btn btn-primary">
                    Editar
                </a>
            </div>
        @endforeach
    @else
        <h3>Não há entrevistas para essa vaga</h3>
    @endif     --}}
@endsection