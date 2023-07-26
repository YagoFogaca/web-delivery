@extends('layout.index')

@section('content')
    <form action={{ route('loja.store') }} method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <h6>Um código de validação foi enviado para o email informado.</h6>
        </div>
        <div>
            <label for="cod">Código</label>
            <input type="text" id="cod" name="cod" required placeholder="0000">
            @error('cod')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <br />
        <br />
        <button type="submit">Criar</button>
    </form>
@endsection
