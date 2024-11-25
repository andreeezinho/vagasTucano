<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark px-lg-5" aria-label="Offcanvas navbar large">
    <div class="container-fluid px-lg-5">
        <a class="navbar-brand" href="/">
            <img src="/img/logo.png" alt="Logo do Vagas Tucano" class="img-logo">
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbar2" aria-labelledby="offcanvasNavbar2Label">
            <div class="offcanvas-header d-table menu-phone">
                <div class="d-flex">
                    <img src="/img/users/default.png" class="offcanvas-title rounded-circle" width="25px" id="offcanvasNavbar2Label">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 mt-5 border-top">
                   @guest
                        <li class="nav-item mt-4 my-2"><a href="#" class="btn btn-light">Login</a></li>
                        <li class="nav-item my-2"><a href="{{route('users.create')}}" class="nav-link">Registre-se</a></li>   
                   @endguest
                </ul>
            </div>

            <div class="offcanvas-body menu-none">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    @guest
                        <li class="nav-item mx-2"><a href="#" class="btn btn-light">Login</a></li>
                        <li class="nav-item mx-2"><a href="{{route('users.create')}}" class="nav-link">Registre-se</a></li>  
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</nav>