<div class="modal modal-item-edit fade modal-products" id="item-{{ $item['id'] }}" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body d-flex flex-column mb-3">

                <div class="d-flex flex-column mb-3">
                    <img style="width: 100%" class="mb-3" src="{{ url('storage/' . $item['product']['image']) }}"
                        alt="Foto do {{ $item['product']['image'] }}" id="img-products">
                    <div class="d-flex justify-content-between mb-3">
                        <h4 id="name-products" class="card-title">{{ $item['product']['name'] }}</h4>
                        <p class="card-text">
                            R$
                            <span id="price-product-{{ $item['id'] }}">
                                {{ $item['product']['prince'] }}
                            </span>
                        </p>
                    </div>
                    <div class="mb-3">
                        <p id="description-products" class="card-text">{{ $item['product']['description'] }}</p>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <form action={{ route('item.update', ['bagItem' => $item['id']]) }} method="POST"
                    class="d-flex flex-column mb-3">
                    @csrf
                    @method('PATCH')
                    <div class="d-flex flex-column mb-3" style="width: 100%;">
                        <div class="mb-3">
                            <label for="observation" class="form-label">Alguma observação?</label>
                            <textarea name="observation" class="form-control" id="observation" rows="2"
                                placeholder="Sem salada, sem molho etc...">{{ $item['observation'] ?? '' }}</textarea>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <div class="input-group">
                            <span class="input-group-text" id="remove-quantity-{{ $item['id'] }}">
                                <i class="bi bi-dash"></i>
                            </span>
                            <input class="form-control" id="quantity-{{ $item['id'] }}"
                                value="{{ $item['amount'] }}" style="padding: 0; text-align: center;" name="amount" />
                            <span class="input-group-text" id="add-quantity-{{ $item['id'] }}">
                                <i class="bi bi-plus-lg"></i>
                            </span>
                        </div>

                        <input type="hidden" name="product_id" id="product_id" value="{{ $item['product']['id'] }}">
                        <input type="hidden" name="price" id="price-item-{{ $item['id'] }}"
                            value=" {{ $item['price'] }}">

                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-bag-fill"></i> Editar
                            <span>R$</span>
                            <span id="prince-demand-{{ $item['id'] }}">
                                {{ $item['price'] }}
                            </span>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
