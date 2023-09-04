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

            <form action={{ route('order.order.closing', ['order' => $order['id']]) }} method="POST" style="padding: 5px;">
                @csrf
                @method('PATCH')

                <h5 style="margin-bottom: 1.2rem;">Método de pagamento</h5>

                <div class="form-check form-check-variant">
                    <input class="form-check-input" type="radio" name="payment-method" id="cartao_credito"
                        value="cartão de crédito">
                    <label style="min-width: 50%;" class="form-check-label" for="cartao_credito">
                        <div>
                            <p style="margin-bottom: 0;">Cartão de Crédito</p>
                        </div>
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment-method" id="cartao_debito"
                        value="cartão de débito">
                    <label style="min-width: 50%;" class="form-check-label" for="cartao_debito">
                        <div>
                            <p style="margin-bottom: 0;">Cartão de Débito</p>
                        </div>
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment-method" id="pix" value="pix">
                    <label style="min-width: 50%;" class="form-check-label" for="pix">
                        <div>
                            <p style="margin-bottom: 0;">Pix</p>
                        </div>
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment-method" id="dinheiro" value="dinheiro">
                    <label style="min-width: 50%;" class="form-check-label" for="dinheiro">
                        <div>
                            <p style="margin-bottom: 0;">Dinheiro</p>
                        </div>
                    </label>
                </div>

                <button class="btn btn-outline-primary" id="btn-money" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">Preciso de troco</button>

                <input type="hidden" name="change-cash" value="0.00" id="input-change-cash">

                <section class="card-shopping-bag-footer">
                    <button id="continue" type="submit" class="btn btn-primary" disabled>Finalizar pedido</button>
                </section>
            </form>

        </section>

        <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasBottomLabel">Informe o valor do troco</h5>
            </div>
            <div class="offcanvas-body small">
                <form id="change-cash">
                    <div class="mb-3">
                        <label for="change_cash" class="form-label">Preço</label>
                        <input type="number" min="0" step=".01" class="form-control" id="change_cash"
                            name="change_cash" placeholder="0.00">
                    </div>
                    <button class="btn btn-outline-primary" type="submit" data-bs-dismiss="offcanvas"
                        aria-label="Close">Adicionar</button>
                </form>
            </div>
        </div>

    </section>
@endsection
