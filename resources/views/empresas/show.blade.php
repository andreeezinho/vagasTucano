@extends('layout.main')

@section('title', 'Empresas Parceiras - Vagas Tucano')

@section('content')

    <div class="container">
        <div class="row">
            <h3 class="pb-3 text-center">Empresas parceiras</h3>

            @if (count($empresas) > 0)
                @foreach($empresas as $empresa)

                    <div class="col-12 col-md-4 col-lg-6 border my-2 py-3">
                        <h5>
                            <img src="/img/empresas/icones/{{$empresa->icone}}" alt="Icone empresa" class="img-logo rounded-circle">
                            {{$empresa->nome}}
                        </h5>

                        <p class="ms-2 my-4 text-muted"><i class="bi-building-fill"></i> Endereço: {{$empresa->endereco}}</p>
                        <p class="ms-2 my-4 text-muted"><i class="bi-telephone-fill"></i> Endereço: {{$empresa->telefone}}</p>
                        <a href="{{route('empresas.detalhes', $empresa->id)}}" class="btn btn-warning">Ver mais</a>
                    </div>

                @endforeach
            @else
                <span>Ainda não há empresas cadastradas...</span>
            @endif
        </div>
    </div>
    
@endsection