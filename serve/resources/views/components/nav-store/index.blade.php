<nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #f86f03 !important;">

    <div class="container-fluid">
        <img src={{ asset('assets/imgs/logo-nav.png') }} alt="Logo" style="width: 125px">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
            aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">

                <li class="nav-item">
                    <a class="nav-link active" href="#">Painel</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Produtos</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Pedidos</a>
                </li>

                <li class="nav-item">
                    <div class="btn-group" style="height: 100%;">
                        <button type="button" class="btn-dropdown dropdown-toggle" data-bs-toggle="dropdown"
                            data-bs-display="static" aria-expanded="false">
                            Right-aligned, left-aligned lg
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-end">
                            <li><a class="dropdown-item" href="#">Configuração</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Sair</a></li>
                        </ul>
                    </div>
                </li>

            </ul>
            {{-- <div class="btn-group">
                <button type="button" class="btn-dropdown dropdown-toggle" data-bs-toggle="dropdown"
                    data-bs-display="static" aria-expanded="false">
                    Right-aligned, left-aligned lg
                </button>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-end">
                    <li><a class="dropdown-item" href="#">Configuração</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Sair</a></li>
                </ul>
            </div> --}}
        </div>
</nav>
