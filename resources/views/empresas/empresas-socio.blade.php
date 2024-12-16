@extends('layout.main')

@section('title', 'Suas Empresas - Vagas Tucano')

@section('content')

    <div class="container">
        <div class="row">
            <h3 class="text-center"><i class="bi-building"></i> Suas Empresas</h3>

            @if (count($empresas) > 0)
                
                @foreach ($empresas as $empresa)
                    <div class="col-12 mx-auto my-4 border py-3">
                        <h4>
                            <img src="/img/empresas/icones/{{$empresa->icone}}" alt="Icone da empresa" class="img-logo rounded-circle">
                            {{$empresa->nome}}
                        </h4>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <p class="text-muted small my-2"><i class="bi-card-text"></i> CNPJ: {{$empresa->cnpj}}</p>
                                <p class="text-muted small my-2"><i class="bi-building-fill"></i> Endereço: {{$empresa->endereco}}</p>
                                <p class="text-muted small my-2"><i class="bi-phone-fill"></i> Telefone: {{$empresa->telefone}}</p>
                            </div>

                            <form action="{{route('empresas.destroy', ['id' => $empresa->id])}}" method="POST" class="col-12 col-md-6 text-center">
                                <a href="{{route('empresas.dashboard', ["id" => $empresa->id])}}" class="btn btn-primary"><i class="bi-box-arrow-right"></i> Entrar</a>

                                <a href="{{route('empresas.edit', ["id" => $empresa->id])}}" class="btn btn-success"><i class="bi-pencil-fill"></i> Editar</a>
                                
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"><i class="bi-trash"></i> Excluir</button>
                            </form>
                        </div>
                    </div>
                
                @endforeach

            @else
                <h4>Não há empresas no momento</h4>
            @endif
        </div>
    </div>

@endsection