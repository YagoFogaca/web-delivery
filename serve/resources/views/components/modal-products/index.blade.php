<div class="modal fade" id="product-{{ $product['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body d-flex flex-column mb-3">

                <div class="d-flex flex-column mb-3">
                    <img style="width: 100%" class="mb-3" src="{{ url('storage/' . $product['image']) }}"
                        alt="Foto do {{ $product['image'] }}" id="img-products">
                    <div class="d-flex justify-content-between mb-3">
                        <h4 id="name-products" class="card-title">{{ $product['name'] }}</h4>
                        <p class="card-text">
                            R$
                            <span id="price-product-{{ $product['id'] }}">
                                {{ $product['prince'] }}
                            </span>
                        </p>
                    </div>
                    <div class="mb-3">
                        <p id="description-products" class="card-text">{{ $product['description'] }}</p>
                    </div>
                </div>
            </div>

            <div class="modal-footer">

                <form action="{{ route('item.bag.store') }}" method="POST" class="d-flex flex-column mb-3">
                    @csrf
                    <div class="d-flex flex-column mb-3" style="width: 100%;">
                        <div class="mb-3">
                            <label for="observation" class="form-label">Alguma observação?</label>
                            <textarea name="observation" class="form-control" id="observation" rows="2"
                                placeholder="Sem salada, sem molho etc..."></textarea>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <div class="input-group">
                            <span class="input-group-text" id="remove-quantity-{{ $product['id'] }}">
                                <i class="bi bi-dash"></i>
                            </span>
                            <input class="form-control" id="quantity-{{ $product['id'] }}" value="1"
                                style="padding: 0; text-align: center;" name="amount" />
                            <span class="input-group-text" id="add-quantity-{{ $product['id'] }}">
                                <i class="bi bi-plus-lg"></i>
                            </span>
                        </div>

                        <input type="hidden" name="product_id" id="product_id" value="{{ $product['id'] }}">
                        <input type="hidden" name="price" id="price-item-{{ $product['id'] }}"
                            value="{{ $product['prince'] }}">

                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-bag-fill"></i> Adicionar
                            <span>R$</span>
                            <span id="prince-demand-{{ $product['id'] }}">
                                {{ $product['prince'] }}
                            </span>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
