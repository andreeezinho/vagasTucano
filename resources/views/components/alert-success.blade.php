@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show position-absolute start-50 translate-middle" style="top: 200px">
        <i class="bi-check mr-2"></i>
        {{session('success')}}
        <button type="button" class="btn-close m-0 pt-2" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif