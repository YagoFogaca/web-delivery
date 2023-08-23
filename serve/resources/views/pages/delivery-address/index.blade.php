@extends('layouts.shopping-bag.index')


@section('content')
    <section class="card-shopping-bag">

        <article class="modal-header">
            <h4 style="margin: 0">Meu Pedido</h4>
            <a href={{ route('menu.home') }} style="font-size: 19px" class="btn-close"></a>
        </article>

        <section class="d-flex flex-column card-shopping-bag-body">
            <form action={{ route('order.store') }} method="POST" style="padding: 5px;">
                @csrf

                @foreach ($adresses as $address)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="address" id="{{ $address['id'] }}"
                            value="{{ $address['cep'] }}">
                        <label class="form-check-label" for="{{ $address['id'] }}">
                            <div>
                                <p class="form-text">Entregar em</p>
                                <p style="margin-bottom: 0.5rem;">{{ $address['street'] }},
                                    <span>{{ $address['number_address'] }}</span>
                                </p>
                                <p class="form-text">{{ $address['district'] }} -
                                    <span>{{ $address['complement'] ?? 'Sem Compl.' }}</span>
                                </p>
                            </div>
                        </label>
                    </div>
                @endforeach

                <section class="card-shopping-bag-footer">
                    <div class="card-price">
                        <p>Total entrega:</p> <span>RS <span id="delivery-value">0</span>,00</span>
                    </div>
                    <button type="submit" class="btn btn-primary">Continuar</button>
                </section>
            </form>
        </section>


    </section>
@endsection
