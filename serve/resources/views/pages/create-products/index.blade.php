@extends('layouts.platform-store.index')

@section('content')
    <section class="container-form-create">
        <h4 style="text-align: center">Crie o produto</h4>
        <form method="POST" action={{ route('products.store') }} enctype="multipart/form-data">
            @error('create')
                <div class='invalid-feedback'><span>{{ $message }}</span></div>
            @enderror
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="X-BURGUER">
                @error('name')
                    <div class='invalid-feedback'><span>{{ $message }}</span></div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Preço</label>
                <input type="number" min="0" step=".01" class="form-control" id="price" name="price"
                    placeholder="19.90">
                @error('price')
                    <div class='invalid-feedback'><span>{{ $message }}</span></div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="description">Descrição</label>
                <input type="text" class="form-control" id="description" name="description"
                    placeholder="Delicioso X-Burguer">
                @error('description')
                    <div class='invalid-feedback'><span>{{ $message }}</span></div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="category">Categoria</label>
                <select name="category" id='category' class="form-select">
                    @foreach ($categories as $category)
                        <option value={{ $category->id }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category')
                    <div class='invalid-feedback'><span>{{ $message }}</span></div>
                @enderror
            </div>


            <div class="mb-3">
                <label class="form-label" for="image">Imagem</label>
                <input type="file" class="form-control" id="image" name="image">
                @error('image')
                    <div class='invalid-feedback'><span>{{ $message }}</span></div>
                @enderror
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Criar</button>
                <button type="reset" class="btn btn-outline-danger">Limpar</button>
            </div>

        </form>
    </section>
@endsection
