@extends('layouts.platform-store.index')

@section('content')
    <section class="container-form-create">
        <h4 style="text-align: center">Editar informações de contato</h4>

        <form class="row g-3" method="POST" action={{ route('store.contact.update', ['store' => $store['id']]) }}>
            @method('PATCH')
            @csrf

            @error('error')
                <div class='invalid-feedback'><span>{{ $message }}</span></div>
            @enderror

            @if (session('contact'))
                <div class='mb-3 valid-feedback' style="display: block; font-size: 22px; margin-top: 1.25rem">
                    <span>{{ session('contact') }}</span>
                </div>
            @endif

            <div class="mb-3">
                <label for="name" class="form-label">Email</label>
                <div class="form-text mb-3" id="basic-addon4">Esse email será usado para login. Lembre-se dele.</div>
                <input type="text" class="form-control" id="email" name="email" value="{{ $store['email'] }}">
                @error('email')
                    <div class='invalid-feedback'><span>{{ $message }}</span></div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="telephone">Telefone (WhatsApp)</label>
                <div class="form-text mb-3" id="basic-addon4">Esse telefone será usado para receber pedidos no seu WhatsApp.
                </div>
                <input type="tel" class="form-control" id="telephone" name="telephone"
                    value="{{ $store['telephone'] }}">
                @error('telephone')
                    <div class='invalid-feedback'><span>{{ $message }}</span></div>
                @enderror
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>

        </form>
    </section>
@endsection
