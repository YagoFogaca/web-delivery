@extends('layouts.platform-store.index')

@section('content')
    <section class="container-form-create">
        <h4 style="text-align: center">Editar o produto</h4>
        <form class="row g-3" method="POST" {{-- action={{ route('products.edit') }} --}} enctype="multipart/form-data">
            @method('PUT')

            @error('update')
                <div class='invalid-feedback'><span>{{ $message }}</span></div>
            @enderror
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="X-BURGUER"
                    value="{{ $product['name'] }}">
                @error('name')
                    <div class='invalid-feedback'><span>{{ $message }}</span></div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="description">Descrição</label>
                <input type="text" class="form-control" id="description" name="description"
                    value="{{ $product['description'] }}">
                @error('description')
                    <div class='invalid-feedback'><span>{{ $message }}</span></div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="price" class="form-label">Preço</label>
                <input type="number" min="0" step=".01" class="form-control" id="price" name="price"
                    placeholder="19.90" value={{ $product['prince'] }}>
                @error('price')
                    <div class='invalid-feedback'><span>{{ $message }}</span></div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label" for="category">Categoria</label>
                <select name="category" id='category' class="form-select">
                    @foreach ($categories as $category)
                        <option value={{ $category->id }} {{ $category->id === $product['category_id'] ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category')
                    <div class='invalid-feedback'><span>{{ $message }}</span></div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="image">Imagem</label>

                <div class="d-flex flex-wrap align-items-end">
                    <img style="width: 48%; min-width: 160px; border-radius:6px; margin-right: 2px"
                        src={{ url('storage/' . $product['image']) }} alt="Imagem do(a) {{ $product['name'] }}">
                    <div class="col-md-6">
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                </div>


                @error('image')
                    <div class='invalid-feedback'><span>{{ $message }}</span></div>
                @enderror
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Atualizar</button>
                <button type="reset" class="btn btn-outline-danger">Limpar</button>
            </div>

        </form>
    </section>
@endsection
