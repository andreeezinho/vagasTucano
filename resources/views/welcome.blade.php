@extends('layout.main')

@section('title', 'Vagas Tucano')

@section('content')
     
    <div class="d-flex bg-dark text-light text-center p-4 desgraca">
        <div class="my-auto mx-auto">
            <img src="/img/logo.png" alt="Logo vagas tucano" class="logo-home">
            <p>Encontre suas vagas no nosso site!</p>
            <form action="{{route('home')}}" method="get">
                <div class="input-group">
                    <input type="text" name="search" id="search" class="form-control" size="50" placeholder="Pesquise uma vaga aqui" required>
                    <button type="submit" class="btn btn-warning"><i class="bi-search"></i></button>
                </div>
            </form>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row justify-content-center my-5">
            <div class="col-12 text-center">
                <h3>Conheça algumas empresas parceiras</h3>
            </div>
            <div class="row">
                @foreach($empresas as $empresa)
                    <div class="col-6 col-md-4 col-lg-2  text-center py-4">
                        <img src="/img/empresas/icones/{{$empresa->icone}}" alt="Logo empresa" class="img-empresas rounded-circle">
                        <h6 class="mt-3">{{$empresa->nome}}</h6>
                    </div>
                @endforeach
            </div>
            <div class="col-12 text-center p-3">
                <a href="{{route('empresas.show')}}" class="btn btn-warning"><i class="bi-building-fill"></i> Veja todas as empresas</a>
            </div>
        </div>

        <div class="row justify-content-center my-5 pt-5">
            <h3 class="pb-2 border-bottom">
                Encontre sua vaga
                <a href="" class="btn btn-warning float-end"> Veja todas as vagas</a>
            </h3>

            @if (count($vagas) > 0)
                
                @foreach ($vagas as $vaga)
                    <div class="col-12 my-4 border py-3">
                        <h4>
                            <img src="img/empresas/icones/{{$vaga->empresa->icone}}" alt="Icone da empresa" class="img-logo">
                            {{$vaga->nome}}
                        </h4>

                        <p class="text-muted my-3"><i class="bi-journal-medical"></i> Tipo da vaga: {{$vaga->tipo}}</p>
                        <p class="text-muted my-3"><i class="bi-{{$vaga->status == "Aberta" ? "check" : "exclamation-circle"}}"></i> Status: {{$vaga->status}}</p>
                        <p class="text-muted my-3"><i class="bi-clock"></i> Válida até: {{date('d/m/Y', strtotime($vaga->data_fechamento))}}</p>
                        <a href="{{route('vaga.detalhes', $vaga->id)}}" class="btn btn-warning">Ver mais <i class="bi-box-arrow-in-up-right"></i></a>
                    </div>
                @endforeach
                
                <div class="text-center mt-5 pt-5">
                    <a href="{{route('vaga.show')}}" class="btn btn-warning"><i class="bi-search"></i> Veja todas as vagas</a>
                </div>
            @else
                <h4 class="text-muted">Não há vagas, por enquanto</h4>
            @endif
        </div>
    </div>
    {{-- 
    @if (count($vagas) > 0)
        @foreach($vagas as $vaga)
            <p>{{$vaga->nome}}</p>
            <p>{{$vaga->tipo}}</p>
            <p>{{$vaga->descricao}}</p>
            <a href="{{route('vaga.detalhes', $vaga->id)}}">Ver</a>
        @endforeach
    @else
        <h3>Vagas não encontradas</h3>
    @endif --}}
@endsection

