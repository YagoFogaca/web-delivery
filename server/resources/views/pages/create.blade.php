@extends('layout.index')

@section('content')
    <section class="card-form">
        <div class="card-logo">
            <img src={{ asset('./assets/imgs/logo.png') }} alt="Logo Web Delivery">
        </div>
        <form action={{ route('loja.store') }} method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nome" class="form-label">Nome da sua loja</label>
                <input type="text" class="form-control" id="nome" name="nome" required placeholder="Web Delivery">
                @error('nome')
                    <div class="invalid-feedback">
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input class="form-control" type="email" id="email" name="email" required placeholder="Seu email">
                @error('email')
                    <div class="invalid-feedback">
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senha" name="password" placeholder="Shiuuu" required>
                @error('senha')
                    <div class="invalid-feedback">
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone (Whatsapp)</label>
                <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="(DD) 9 0000-0000"
                    required>
                @error('telefone')
                    <div class="invalid-feedback">
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="imagem" class="form-label">Sua logo</label>
                <input type="file" id="imagem" class="form-control" name="imagem" accept="image/png, image/jpeg"
                    required>
                @error('imagem')
                    <div class="invalid-feedback">
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <div class="d-grid gap-2">
                <a href="" style="text-align: center; margin: 20px 0">Faça login aqui</a>
                <button type="submit" class="btn btn-primary">Criar</button>
            </div>
        </form>
    </section>
@endsection
