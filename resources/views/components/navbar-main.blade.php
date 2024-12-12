<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark px-lg-5" aria-label="Offcanvas navbar large">
    <div class="container-fluid px-lg-5">
        <a class="navbar-brand" href="/">
            <img src="/img/logo.png" alt="Logo do Vagas Tucano" class="img-logo">
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbar2" aria-labelledby="offcanvasNavbar2Label">
            @include('components.navbar.menu-phone')
            
            @include('components.navbar.menu-desktop')
        </div>
    </div>
</nav>