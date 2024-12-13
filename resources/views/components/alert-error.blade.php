{{--imprimir erros caso o REQUEST reporte algo --}}
@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger mt-3 alert-dismissible fade show" style="z-index: 10000">
            {{$error}}
            <button type="button" class="btn-close m-0 pt-2" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endforeach
@endif

@if(session('erro'))

    <div class="alert alert-danger mt-3 alert-dismissible fade show" style="z-index: 10000">
        {{session('erro')}}
        <button type="button" class="btn-close m-0 pt-2" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

@endif