<div class="card" id="{{ $product['id'] }}">
    <img src={{ url('storage/' . $product['image']) }} class="card-img-top img-products" alt="Imagem do produto">
    <div class="card-body">

        <div class="d-flex justify-content-between">
            <h5 class="card-title">{{ $product['name'] }}</h5>
            <p class="card-text">R$ {{ $product['prince'] }}</p>
        </div>

        <div class="mb-3">
            <p class="card-text">Descrição</p>
            <p class="card-text description">{{ $product['description'] }}</p>
        </div>

        <div class="d-flex flex-row mb-3">
            <button id="{{ $product['id'] }}" type="button" class="btn btn-warning" data-bs-toggle="modal"
                data-bs-target="#product-{{ $product['id'] }}"><i class="bi bi-bag-plus-fill"></i>
                Adicionar</button>
        </div>
    </div>
</div>
