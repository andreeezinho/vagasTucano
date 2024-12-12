<div class="offcanvas-header d-table menu-phone">
    <div class="d-flex">
        <img src="/img/users/{{auth()->user()->icone ?? 'default.png'}}" class="offcanvas-title rounded-circle" width="25px" id="offcanvasNavbar2Label">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 mt-5 border-top">
        <li class="nav-item mt-2"><a href="{{route('vaga.show')}}" class="nav-link"><i class="bi-suitcase-lg-fill"></i> Vagas</a></li>
        <li class="nav-item mt-2"><a href="{{route('empresas.show')}}" class="nav-link"><i class="bi-building-fill"></i> Empresas</a></li>

        @auth
            <li class="nav-item mt-2"><a class="nav-link" href="{{route('user.edit')}}"><i class="bi-person-fill"></i> Meu Perfil</a></li>
            <li class="nav-item mt-2"><a class="nav-link" href="{{route('users.vagas')}}"><i class="bi-suitcase-lg-fill"></i> Suas Vagas</a></li>
            <li class="nav-item mt-2"><a class="nav-link" href="{{route('users.entrevistas')}}"><i class="bi-person-video2"></i> Suas Entrevistas</a></li>

            @if(auth()->user()->socio == 1)
                <li class="nav-item mt-2"><a class="nav-link" href="{{route('empresas.create')}}"><i class="bi-building-add"></i> Criar empresa</a></li>
                <li class="nav-item mt-2"><a class="nav-link" href="{{route('user.empresas')}}"><i class="bi-building"></i> Suas Empresas</a></li>
            @endif

            <li class="nav-item">
                <form action="/logout" method="POST">
                    @csrf
                    <a class="nav-link" href="/logout" onclick="event.preventDefault(); this.closest('form').submit();"><i class="bi-door-open-fill"></i> Sair</a>
                </form>
            </li>
        @endauth

        @guest
                <li class="nav-item mt-4 my-2"><a href="{{route('login')}}" class="btn btn-light">Login</a></li>
                <li class="nav-item my-2"><a href="{{route('users.create')}}" class="nav-link">Registre-se</a></li>   
        @endguest
    </ul>
</div>