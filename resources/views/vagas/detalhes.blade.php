@extends('layout.main')

@section('title', 'Vagas Tucano')

@section('content')

    <div class="container"> 
        <div class="row justify-content-center">
            <div class="text-muted mb-3">
                <img src="/img/empresas/icones/{{$vaga->empresa->icone}}" alt="Logo empresa" class="icone-user rounded-circle"> 
                {{$vaga->empresa->nome}}
            </div>

            <h2 class="border-bottom pb-3">
                {{$vaga->nome}}
                @if($participa)
                    <form action="{{route('vaga.sair', $vaga->id)}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-secondary float-end"><i class="bi-box-arrow-left"></i> Sair da vaga</button>
                    </form>
                @else
                    <button class="btn btn-warning float-end" data-toggle="modal" data-target="#modal">Candidatar-se <i class="bi-box-arrow-up-right"></i></button>
                @endif
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
                    <p class="text-muted">{!! nl2br(e($vaga->descricao)) !!}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-tamanho">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><i class="bi-clipboard2-fill"></i> Insira seu currículo</h5>
                    <button type="button" class="btn-close" data-dismiss="modal"></button>
                </div>

                

                <div class="modal-body d-flex">
                    <iframe src="" class="border pdf" id="preview"></iframe>
                </div>

                <form action="{{route('vaga.candidatar', $vaga->id)}}" method="POST" class="modal-footer" enctype="multipart/form-data">
                    @csrf
        
                    <div class="form-group">
                        <label for="icone" class="btn btn-warning">Insira seu currículo</label>
                        <input type="file" name="curriculo" id="icone" class="d-none">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Candidate-se</button>
                </form>
            </div>
        </div>
    </div>
@endsection

