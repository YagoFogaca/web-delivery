<div class="modal fade modal-shopping-bag" id="modal-shopping-bag" tabindex="-1" aria-labelledby="modal-shopping-bag"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h4 style="margin: 0">Meu Pedido</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body d-flex flex-column mb-3">

                @if (Auth::check())
                    <div class="card-products-items">


                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">Nome Do Lanche</h5>
                            <a href="#" style="color: black">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                        </div>

                        <div>
                            <p class="card-text">Observação</p>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <p class="card-text" style="margin: 0px">
                                R$
                                <span {{-- id="price-product-{{ $product['id'] }}" --}}>
                                    {{-- {{ $product['prince'] }} --}} 14,90
                                </span>
                            </p>

                            <div class="input-group">
                                <span class="input-group-text" {{-- id="remove-quantity-{{ $product['id'] }}" --}}>
                                    <i class="bi bi-dash"></i>
                                </span>
                                <input class="form-control" {{-- id="quantity-{{ $product['id'] }}" --}} value="1"
                                    style="padding: 0; text-align: center;" name="amount" />
                                <span class="input-group-text" {{-- id="add-quantity-{{ $product['id'] }}" --}}>
                                    <i class="bi bi-plus-lg"></i>
                                </span>
                            </div>

                        </div>


                    </div>
                @else
                    <h1>Você não fez login</h1>
                @endif

                {{--
                      INFOS DOS ITENS :
                      Imagem, Nome do Lanche
                      Observação
                      Preço dos itens
                      Quantidade
                    --}}

                {{-- <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ url('storage/' . $bagItems[0]['product']['image']) }}"
                                    class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins
                                            ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div> --}}
            </div>

            <div class="modal-footer">

            </div>

        </div>
    </div>
</div>
