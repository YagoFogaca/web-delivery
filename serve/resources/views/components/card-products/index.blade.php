<div class="card">
    <img src={{ url('storage/' . $product['image']) }} class="card-img-top" alt="Imagem do produto">
    <div class="card-body">

        <div class="d-flex justify-content-between">
            <h5 class="card-title">{{ $product['name'] }}</h5>
            <p class="card-text">R$ {{ $product['prince'] }}</p>
        </div>

        <div class="mb-3">
            <p class="card-text">Descrição</p>
            <p class="card-text">{{ $product['description'] }}</p>
        </div>

        <div class="d-flex flex-row mb-3">
            <a href={{ route('platform.edit.products', ['product' => $product['id']]) }} class="btn btn-warning"><i
                    class="bi bi-bag-plus-fill"></i> Adicionar</a>
        </div>
    </div>
</div>
