@extends('layouts.menu.index')

@section('content')
    <section class="card-infos-restaurant">
        <div class="card-img-logo">
            <img class="img-logo" src={{ asset('assets/imgs/logo-moto.png') }} alt="Logo da Fogaça´s Burger">
        </div>
        <article class="infos">
            <h3>Fogaça´s Burger</h3>
            <p>
                <i class="bi bi-send-fill"></i> {{ $store['district'] }} , {{ $store['street'] }}
            </p>
            <div class="d-flex justify-content-between">

                @if ($store['shop_open'])
                    <p class="check-open">
                        <i class="bi bi-check-circle-fill"></i>
                        Aberto
                    </p>
                @else
                    <p class="check-closed">
                        <i class="bi bi-x-circle-fill"></i> Fechado
                    </p>
                @endif
                <p>
                    <i class="bi bi-clock-fill"></i> {{ $store['hour']['start_time'] }} até {{ $store['hour']['end_time'] }}
                </p>
            </div>
        </article>
    </section>

    <section class="card-infos-restaurant variant">
        <section class="sandbox__carousel">
            <div class="embla">
                <div class="embla__viewport">
                    <div class="embla__container">
                        @foreach ($categories as $category)
                            <div class="embla__slide">
                                <button class="btn btn-primary">{{ $category->name }}</button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <form role="search">
            <input class="form-control form-control-sm" type="search" placeholder="Busque por produtos"
                aria-label="Search">
        </form>
    </section>

    <section class="cards-products">
        @foreach ($products as $product)
            @include('components.card-products.index', ['product' => $product])
            @include('components.modal-products.index', ['product' => $product])
        @endforeach
    </section>

    @include('components.nav-restaurant.index')
@endsection
