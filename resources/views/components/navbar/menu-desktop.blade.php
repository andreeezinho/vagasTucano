<div class="offcanvas-body menu-none">
    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
        <li class="nav-item"><a href="{{route('vaga.show')}}" class="nav-link"><i class="bi-suitcase-lg-fill"></i> Vagas</a></li>
        <li class="nav-item"><a href="{{route('empresas.show')}}" class="nav-link"><i class="bi-building-fill"></i> Empresas</a></li>

        @auth
            <li class="nav-item">
                <form action="{{route('home')}}" metohd="get">
                    <div class="input-group">
                        <input type="text" name="search" id="search" class="form-control bg-light" placeholder="Busque uma vaga">
                        <button type="submit" class="btn btn-light"><i class="bi-search"></i></button>
                    </div>
                </form>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="/img/users/{{auth()->user()->icone ?? 'default.jpg'}}" alt="icone" class="rounded-circle" width="25px">
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('user.edit')}}"><i class="bi-person-fill"></i> Meu Perfil</a></li>
                    <li><a class="dropdown-item" href="{{route('users.vagas')}}"><i class="bi-suitcase-lg-fill"></i> Suas Vagas</a></li>
                    <li><a class="dropdown-item" href="{{route('users.entrevistas')}}"><i class="bi-person-video2"></i> Suas Entrevistas</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    @if(auth()->user()->socio == 1)
                        <li><a class="dropdown-item" href="{{route('empresas.create')}}"><i class="bi-building-add"></i> Criar empresa</a></li>
                        <li><a class="dropdown-item" href="{{route('user.empresas')}}"><i class="bi-building"></i> Suas Empresas</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                    @endif

                    <li>
                        <form action="/logout" method="POST">
                            @csrf
                            <a class="dropdown-item" href="/logout" onclick="event.preventDefault(); this.closest('form').submit();"><i class="bi-door-open-fill"></i> Sair</a>
                        </form>
                    </li>
                </ul>
            </li>
        @endauth

        @guest
            <li class="nav-item mx-2"><a href="{{route('login')}}" class="btn btn-light">Login</a></li>
            <li class="nav-item"><a href="{{route('users.create')}}" class="nav-link">Registre-se</a></li>  
        @endguest
    </ul>
</div>