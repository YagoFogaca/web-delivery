@extends('layout.index')

@section('content')
    <form action={{ route('loja.store') }} method="post" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="nome">Nome da sua loja</label>
            <input value="teste" type="text" id="nome" name="nome" required placeholder="Web Delivery">
            @error('nome')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <br />
        <div>
            <label for="email">Email</label>
            <input value="yagofogaca20@gmail.com" type="email" id="email" name="email" required
                placeholder="Seu email">
            @error('email')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <br />
        <div>
            <label for="senha">Senha</label>
            <input value="12345678" type="password" id="senha" name="password" required>
            @error('senha')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <br />
        <div>
            <label for="telefone">Telefone (Whatsapp)</label>
            <input value="32988810181" type="tel" id="telefone" name="telefone" required>
            @error('telefone')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <br />
        <div>
            <label for="imagem">Sua logo</label>
            <input type="file" id="imagem" name="imagem" accept="image/png, image/jpeg" required>
            @error('imagem')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <br />
        <br />
        <button type="submit">Criar</button>

    </form>
@endsection
