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
                    <a class="nav-link active" href={{ route('platform.index') }}>Painel</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href={{ route('products.index') }}>Produtos</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Pedidos</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Conta
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item"
                                href={{ route('store.contact.edit', ['store' => Auth::guard('store')->user()->id]) }}>Contato</a>
                        </li>
                        <li><a class="dropdown-item"
                                href={{ route('store.address.edit', ['store' => Auth::guard('store')->user()->id]) }}>Endereço</a>
                        </li>
                        <li><a class="dropdown-item" href={{ route('store.open-hours.edit') }}>Horario de
                                Funcionamento</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href={{ route('store.security.edit') }}>Segurança</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Sair</a>
                </li>

            </ul>
        </div>
</nav>
