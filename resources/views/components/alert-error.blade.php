{{--imprimir erros caso o REQUEST reporte algo --}}
@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show position-absolute start-50 translate-middle" style="top: 200px">
            <i class="bi-exclamation-triangle-fill mr-2"></i>
            {{$error}}
            <button type="button" class="btn-close m-0 pt-2" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endforeach
@endif

@if(session('erro'))

    <div class="alert alert-danger alert-dismissible fade show position-absolute start-50 translate-middle" style="top: 200px">
        <i class="bi-exclamation-triangle-fill mr-2"></i>
        {{session('erro')}}
        <button type="button" class="btn-close m-0 pt-2" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

@endif