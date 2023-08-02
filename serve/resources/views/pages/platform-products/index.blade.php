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
            <div class="d-flex justify-content-between">
                <h4>Produtos</h4>
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                    data-bs-target="#createModal">Criar produto</button>
            </div>
        </section>
    </section>

    @include('components.modal-create-products.index', ['categories' => $categories])
@endsection
