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
                        <select class="form-select form-select-sm" aria-label="Small select example">
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



    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Criar produto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Nome</label>
                            <input type="email" class="form-control" id="name" aria-describedby="emailHelp"
                                placeholder="X-BURGUER">
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Preço</label>
                            <input type="text" class="form-control" id="price" placeholder="19,90">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="description">Descrição</label>
                            <input type="text" class="form-control" id="description" placeholder="Delicioso X-Burguer">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="Categoria">Categoria</label>
                            <select class="form-select">
                                @foreach ($categories as $category)
                                    <option value={{ $category->id }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="mb-3">
                            <label class="form-label" for="image">Imagem</label>
                            <input type="file" class="form-control" id="image">
                        </div>

                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger">Limpar</button>
                            <button type="submit" class="btn btn-primary">Criar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
