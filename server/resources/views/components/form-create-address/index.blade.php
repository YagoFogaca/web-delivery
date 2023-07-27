@extends('components.card-form.index')

@section('form')
    <form class="row g-3" action={{ route('address.store') }} method="post">
        @csrf

        <div class="col-md-4">
            <label for="cep" class="form-label">CEP</label>
            <input type="text" class="form-control" id="cep" name="cep" required>
            @error('cep')
                <div class="invalid-feedback">
                    <span>{{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="estado" class="form-label">Estado</label>
            <input type="text" class="form-control" id="estado" name="estado" required>
            @error('estado')
                <div class="invalid-feedback">
                    <span>{{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="cidade" class="form-label">Cidade</label>
            <input type="text" class="form-control" id="cidade" name="cidade" required>
            @error('cidade')
                <div class="invalid-feedback">
                    <span>{{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="rua" class="form-label">Rua</label>
            <input type="text" class="form-control" id="rua" name="rua" required>
            @error('rua')
                <div class="invalid-feedback">
                    <span>{{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="col-md-2">
            <label for="numero" class="form-label">Número</label>
            <input type="text" class="form-control" id="numero" name="numero" required>
            @error('numero')
                <div class="invalid-feedback">
                    <span>{{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="complemento" class="form-label">complemento</label>
            <input type="text" class="form-control" id="complemento" name="complemento" required>
            @error('complemento')
                <div class="invalid-feedback">
                    <span>{{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Seguir</button>
        </div>
    </form>
@endsection
