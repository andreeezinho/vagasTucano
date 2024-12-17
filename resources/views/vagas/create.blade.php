@extends('layout.main')

@section('title','Empresas - Vagas Tucano')

@section('content')
    <div class="container">
        <div class="mb-2">
            <a href="{{route('empresas.dashboard', $empresa->id)}}" class="btn btn-secondary rounded-circle"><i class="bi-arrow-left"></i></a>
        </div>
        <div class="row">
            <h3 class="border-bottom pb-2">
                <img src="/img/empresas/icones/{{$empresa->icone}}" alt="Icone empresa" class="rounded-circle border border-light border-3 img-empresas">
                {{$empresa->nome}}
            </h3>

            <h4 class="text-center mt-4"><i class="bi-plus"></i> Criar Vaga</h4>
            <form action="{{route('vaga.store', $empresa->id)}}" method="POST" class="col-12 col-md-6 mx-auto text-center">
                @csrf
    
                <div class="form-floating my-4">                       
                    <input type="text" name="nome" id="nome" class="form-control">
                    <label for="nome">Insira o nome da vaga</label>
                </div>
    
                <div class="form-floating my-4">                       
                    <input type="text" name="tipo" id="tipo" class="form-control">
                    <label for="tipo">Insira o tipo da vaga (CLT, PJ, Estágio...)</label>
                </div>
    
                <div class="form-floating my-4">                       
                    <input type="date" name="data_fechamento" id="data_fechamento" class="form-control">
                    <label for="data_fechamento">Insira o prazo final da vaga</label>
                </div>
    
                <select name="status" class="form-select my-4">                       
                    <option selected >Selecione o status da vaga</option>
                    <option value="Aberta">Aberta</option>
                    <option value="Fechada">Fechada</option>
                </select>
    
                <div class="form-group my-4">                     
                    <textarea name="descricao" class="form-control" rows="10" placeholder="Insira uma descrição da vaga"></textarea>
                </div>
    
                <button type="submit" class="btn btn-warning"><i class="bi-plus"></i> Confirmar</button>
            </form>
        </div>
    </div>
@endsection