@extends('layout.main')

@section('title','Empresas - Vagas Tucano')

@section('content')
    <div class="container">
        <div class="mb-2">
            <a href="{{route('empresas.dashboard', $vaga->empresa->id)}}" class="btn btn-secondary rounded-circle"><i class="bi-arrow-left"></i></a>
        </div>
        
        <div class="row">
            <h3 class="border-bottom pb-2">
                <img src="/img/empresas/icones/{{$vaga->empresa->icone}}" alt="Icone empresa" class="rounded-circle border border-light border-3 img-empresas">
                {{$vaga->empresa->nome}}
            </h3>

            <h4 class="text-center mt-4"><i class="bi-pencil"></i> Editar Vaga</h4>
            <form action="{{route('vaga.update', ['id' => $vaga->empresa->id, 'id_vaga' => $vaga->id])}}" method="POST" class="col-12 col-md-6 mx-auto text-center">
                @csrf
                @method('PUT')
    
                <div class="form-floating my-4">                       
                    <input type="text" name="nome" id="nome" class="form-control" value="{{$vaga->nome}}">
                    <label for="nome">Insira o nome da vaga</label>
                </div>
    
                <div class="form-floating my-4">                       
                    <input type="text" name="tipo" id="tipo" class="form-control" value="{{$vaga->tipo}}">
                    <label for="tipo">Insira o tipo da vaga (CLT, PJ, Estágio...)</label>
                </div>
    
                <div class="form-floating my-4">                       
                    <input type="date" name="data_fechamento" id="data_fechamento" class="form-control" value="{{$vaga->data_fechamento}}">
                    <label for="data_fechamento">Insira o prazo final da vaga</label>
                </div>
    
                <select name="status" class="form-select my-4" value="{{$vaga->status}}">                       
                    <option value="Aberta">Aberta</option>
                    <option value="Fechada">Fechada</option>
                </select>
    
                <div class="form-group my-4">                     
                    <textarea name="descricao" class="form-control" rows="10" placeholder="Insira uma descrição da vaga">{{$vaga->descricao}}</textarea>
                </div>
    
                <button type="submit" class="btn btn-warning"><i class="bi-plus"></i> Confirmar</button>
            </form>
        </div>

        {{-- <form action="{{route('vaga.update', ['id' => $vaga->empresa->id, 'id_vaga' => $vaga->id])}}" method="POST" class="d-flex flex-column">
            @csrf
            @method('PUT')
    
            <input type="text" name="nome" id="nome" value="{{$vaga->nome}}">
            <textarea name="descricao" id="descricao">{{$vaga->descricao}}</textarea>
            <select name="status" id="status" value="{{$vaga->status}}">
                <option value="Aberta">aberta</option>
                <option value="Fechada">Fechada</option>
            </select>
            <input type="text" name="tipo" id="tipo" value="{{$vaga->tipo}}">
            <input type="date" name="data_fechamento" id="data_fechamento" value="{{$vaga->data_fechamento}}">
    
            <button type="submit">Confirmar</button>
        </form>     --}}
    </div>
@endsection