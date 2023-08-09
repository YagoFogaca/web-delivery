@extends('layouts.platform-store.index')

@section('content')
    <section class="section-products">
        <aside class="filter-menu">
            <h4>Filtros</h4>
            <form role="search">
                <div class="mb-3">
                    <input class="form-control me-2" type="search" placeholder="Busque por produtos ou categoria"
                        aria-label="Search">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon3">Ordenar por</span>
                        <select class="form-select form-select-sm">
                            <option value="crescente">A-Z</option>
                            <option value="decrescente">Z-A</option>
                        </select>
                    </div>
                </div>
            </form>

            <div class="list-group">
                @foreach ($categories as $category)
                    <button type="button"
                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        {{ $category->name }}
                        <span class="badge bg-primary rounded-pill">{{ $category->productCount() }}</span>
                    </button>
                @endforeach
            </div>
        </aside>

        <section class="container-products">
            <div class="container-products--infos">
                <h4>Produtos</h4>
                <a href={{ route('platform.create.products') }} class="btn btn-outline-primary">Criar produto</a>
            </div>
            <article class="cards-products">
                @foreach ($products as $product)
                    <div class="card" style="max-width: 485px;">
                        <img src={{ url('storage/' . $product['image']) }} class="card-img-top" alt="Imagem do produto">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">{{ $product['name'] }}</h5>
                                <form class="form-check form-switch">
                                    <input class="form-check-input active-product" type="checkbox" name="active"
                                        role="switch" id="active" {{ $product['active'] ? 'checked' : '' }}>
                                    <label class="form-check-label" for="active">Ativo</label>
                                    <input type="hidden" name="id" class="id" value='{{ $product['id'] }}'>
                                </form>
                            </div>

                            <div class="d-flex justify-content-between">
                                <p class="card-text">R$ {{ $product['prince'] }}</p>
                                <p class="card-text">Categoria: {{ $product['category']['name'] }}</p>
                            </div>

                            <div class="mb-3">
                                <p class="card-text">Descrição</p>
                                <p class="card-text">{{ $product['description'] }}</p>
                            </div>

                            <div class="d-grid gap-2">
                                <a href={{ route('platform.edit.products', ['product' => $product['id']]) }}
                                    class="btn btn-warning">Editar</a>
                                <form action={{ route('products.delete', ['id' => $product['id']]) }} method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="width: 100%"
                                        class="btn btn-outline-danger">Deletar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </article>
        </section>
    </section>
@endsection
