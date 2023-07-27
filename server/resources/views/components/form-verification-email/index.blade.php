@extends('components.card-form.index')

@section('form')
    <form action={{ route('email.check') }} method="post">
        @csrf
        <div class="mb-3">
            <h4>Um código de validação foi enviado para o email informado.</h4>
        </div>
        <div class="mb-3">
            <label class="form-label" for="cod">Código</label>
            <input class="form-control" type="text" id="cod" name="cod" required placeholder="0000">
            @error('cod')
                <div class="invalid-feedback">
                    <span>{{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="d-grid gap-2">
            <a href="" style="text-align: center; margin: 20px 0">Não recebi o código</a>
            <button type="submit" class="btn btn-primary">Validar</button>
        </div>
    </form>
@endsection
