@extends('layouts.shopping-bag.index')


@section('content')
    <section class="card-shopping-bag">
        <article class="modal-header">
            <h4 style="margin: 0">Meu Pedido</h4>
            <a href={{ route('menu.home') }} style="font-size: 19px" class="btn-close"></a>
        </article>
        <section class="d-flex flex-column card-shopping-bag-body">
            @foreach ($items as $item)
                <div class="card-products-items">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">{{ $item['product']['name'] }}</h5>
                        <div>
                            <i class="bi bi-pencil-fill"></i>
                            <a href="#" style="color: black">
                                <i class="bi bi-trash-fill" style="color: red; margin-left: 5px"></i>
                            </a>
                        </div>
                    </div>

                    <div>
                        <p class="card-text">Observação</p>
                        <p class="card-text">{{ $item['observation'] ?? 'Sem Observação' }}</p>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <p class="card-text" style="margin: 0px">
                            R$
                            <span>
                                {{ $item['price'] }}
                            </span>
                        </p>

                        <p class="card-text" style="margin: 0px">
                            Quantidade:
                            <span>
                                {{ $item['amount'] }}
                            </span>
                        </p>
                    </div>
                </div>
            @endforeach
        </section>

        <section class="card-shopping-bag-footer">
            <button type="submit" class="btn btn-primary">Finalizar Pedido R$ <span>{{ $item['price'] }}</span>
            </button>
        </section>
    </section>
@endsection
