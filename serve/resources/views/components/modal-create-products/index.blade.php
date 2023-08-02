<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Criar produto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action={{ route('products.store') }} enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="X-BURGUER">
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Preço</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="19,90">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="description">Descrição</label>
                        <input type="text" class="form-control" id="description" name="description"
                            placeholder="Delicioso X-Burguer">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="category">Categoria</label>
                        <select name="category" id='category' class="form-select">
                            @foreach ($categories as $category)
                                <option value={{ $category->id }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mb-3">
                        <label class="form-label" for="image">Imagem</label>
                        <input type="file" class="form-control" id="image" name="image">
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
