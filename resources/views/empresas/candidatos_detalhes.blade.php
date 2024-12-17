@extends('layout.main')

@section('title','Empresas - Vagas Tucano')

@section('content')

    <div class="container"> 
        <div class="mb-2">
            <a href="{{route('vaga.candidatos', ['id' => $id, 'id_vaga' => $vaga->id])}}" class="btn btn-secondary rounded-circle"><i class="bi-arrow-left"></i></a>
        </div>

        <div class="row">
            <h3 class="border-bottom pb-2 mb-4">
                <img src="/img/empresas/icones/{{$vaga->empresa->icone}}" alt="Icone empresa" class="rounded-circle border border-light border-3 img-empresas">
                {{$vaga->nome}}
            </h3>

            <div class="col-12 col-md-6 mb-5">
                <h3 class="text-muted mb-5">
                    <img src="/img/users/{{$candidato->icone}}" alt="Icone empresa" class="rounded-circle border border-3" style="width: 70px">
                    {{$candidato->name}}
                </h3>

                <p class="text-muted my-3"><i class="bi-card-text"></i> CPF: {{$candidato->cpf}}</p>
                <p class="text-muted my-3"><i class="bi-telephone-fill"></i> Telefone: {{$candidato->telefone}}</p>
                <p class="text-muted my-3"><i class="bi-mailbox"></i> Email: {{$candidato->email}}</p>

                @if ($entrevistaMarcada == true)
                    <form action="{{route('candidato.entrevista.remover', ['id' => $id, 'id_vaga' => $vaga->id, 'id_candidato' => $candidato->id, 'id_entrevista' => $id_entrevista])}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-secondary"><i class="bi-x-circle"></i> Desmarcar entrevista</button>
                    </form>
                @else
                    <a href="{{route('candidato.entrevista', ['id' => $id, 'id_vaga' => $vaga->id, 'id_candidato' => $candidato->id])}}" class="btn btn-warning"><i class="bi-person-video"></i> Aprovar candidato para entrevista</a>
                @endif
            </div>

            <div class="col-12 col-md-6 text-center">
                <embed src="/vagas/curriculos/{{$curriculo}}" width="80%" height="800px" type='application/pdf' class="">
            </div>
        </div>
    </div>

    {{-- <div class="border">
        <p>{{$candidato->name}}</p>
        <p>{{$candidato->cpf}}</p>

        <!-- <iframe src="/vagas/curriculos/{{$curriculo}}" width="600" height="780" style="border: none;"></iframe> -->

        <embed src="/vagas/curriculos/{{$curriculo}}" width="760" height="500" type='application/pdf'>


        @if ($entrevistaMarcada == true)
            <form action="{{route('candidato.entrevista.remover', ['id' => $id, 'id_vaga' => $id_vaga, 'id_candidato' => $candidato->id, 'id_entrevista' => $id_entrevista])}}" method="post">
                @csrf
                @method('delete')
                <button type="submit">Desmarcar entrevista</button>
            </form>
        @else
            <a href="{{route('candidato.entrevista', ['id' => $id, 'id_vaga' => $id_vaga, 'id_candidato' => $candidato->id])}}">Aprovar candidato para entrevista</a>
        @endif
    </div> --}}
@endsection