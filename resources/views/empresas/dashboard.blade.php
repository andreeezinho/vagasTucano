@extends('layout.main')

@section('title', 'Sua Empresa - Vagas Tucano')

@section('content')
    
    <div class="container">
        <div class="row">
            <h3 class="border-bottom pb-2">
                <img src="/img/empresas/icones/{{$empresa->icone}}" alt="Icone empresa" class="rounded-circle border border-light border-3 img-empresas">
                {{$empresa->nome}}
            </h3>

            <div class="my-3">
                <a href="{{route('vaga.cadastro', $empresa->id)}}" class="btn btn-warning"><i class="bi-plus"></i> Criar Vaga</a>
            </div>

            <div>
                <h4>Vagas da empresa</h4>

                @if (count($vagas) > 0)
                    @foreach ($vagas as $vaga)
                        <div class="col-12 mx-auto my-4 border py-3 px-3">
                            <h4>{{$vaga->nome}}</h4>

                            <p class="text-muted my-3"><i class="bi-journal-medical"></i> Tipo da vaga: {{$vaga->tipo}}</p>
                            <p class="text-muted my-3"><i class="bi-{{$vaga->status == "Aberta" ? "check" : "exclamation-circle"}}"></i> Status: {{$vaga->status}}</p>
                            <p class="text-muted my-3"><i class="bi-clock"></i> Válida até: {{date('d/m/Y', strtotime($vaga->data_fechamento))}}</p>
                        
                            <form action="{{route('vaga.delete', ['id' => $empresa->id, 'id_vaga' => $vaga->id])}}" method="POST" class="text-center mt-3">
                                <a href="{{route('vaga.candidatos', ['id' => $empresa->id, 'id_vaga' => $vaga->id])}}" class="btn btn-success"><i class="bi-people"></i> Ver candidatos</a>
                                <a href="{{route('vaga.entrevistas', ['id' => $empresa->id, 'id_vaga' => $vaga->id])}}" class="btn btn-primary"><i class="bi-person-video2"></i> Ver entrevistas</a>
                                <a href="{{route('vaga.editar', ['id' => $empresa->id, 'id_vaga' => $vaga->id])}}" class="btn btn-secondary"><i class="bi-pencil-fill"></i> Editar</a>

                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"><i class="bi-trash"></i> Excluir</button>
                            </form>
                        </div>
                    @endforeach
                @else
                    <p class="text-muted">Não há vagas na empresa</p>
                @endif
            </div>
        </div>
    </div>

    {{-- <a href="{{route('vaga.cadastro', $empresa->id)}}">Criar vaga</a>
    @foreach ($vagas as $vaga)
        <div class="border">
            <p>{{$vaga->nome}}</p>
            <p>{{$vaga->descricao}}</p>
            <p>{{$vaga->tipo}}</p>
            <a href="{{route('vaga.candidatos', ['id' => $empresa->id, 'id_vaga' => $vaga->id])}}">Ver candidatos</a>
            <a href="{{route('vaga.entrevistas', ['id' => $empresa->id, 'id_vaga' => $vaga->id])}}">Ver entrevistas</a>
            <a href="{{route('vaga.editar', ['id' => $empresa->id, 'id_vaga' => $vaga->id])}}" class="btn btn-primary">Editar</a>
            <form action="{{route('vaga.delete', ['id' => $empresa->id, 'id_vaga' => $vaga->id])}}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-danger">Excluir</button>
            </form>
        </div>
    @endforeach --}}
@endsection