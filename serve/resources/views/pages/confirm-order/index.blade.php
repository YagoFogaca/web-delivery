@extends('layouts.shopping-bag.index')


@section('content')
    <section class="card-shopping-bag">

        <article class="modal-header">
            <h4 style="margin: 0">Meu Pedido</h4>
            <a href={{ route('menu.home') }} style="font-size: 19px" class="btn-close"></a>
        </article>

        <section class="d-flex flex-column card-shopping-bag-body">

            <div class="summary-value">
                <h5>Resumo de valores</h5>

                <div class="summary-value-infos">
                    <div class="d-flex justify-content-between">
                        <p>Subtotal</p>
                        <p class="value">R$
                            {{ number_format($order['total_payable'] - $order['delivery_value'], 2, ',', '') }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="infos-title">Taxa de entrega</p>
                        <p class="value">R$ {{ number_format($order['delivery_value'], 2, ',', '') }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="infos-title-variant">Total</p>
                        <p class="value">R$ {{ number_format($order['total_payable'], 2, ',', '') }}</p>
                    </div>
                </div>

            </div>

            <section class="card-shopping-bag-footer">
                <a id="continue" target="_blank" href="{{ $url }}" class="btn btn-primary">Finalizar pedido</a>
            </section>
        </section>

    </section>
@endsection
