@extends('layouts.platform-store.index')

@section('content')
    <section class="container-form-create">
        <h4 style="text-align: center">Editar informações de endereço</h4>

        <form class="row g-3" method="POST" action={{ route('store.address.update', ['store' => $store['id']]) }}>
            @method('PUT')
            @csrf

            @error('error')
                <div class='invalid-feedback'><span>{{ $message }}</span></div>
            @enderror

            @if (session('address'))
                <div class='mb-3 valid-feedback' style="display: block; font-size: 22px; margin-top: 1.25rem">
                    <span>{{ session('address') }}</span>
                </div>
            @endif

            <div class="mb-3 col-md-4">
                <label for="cep" class="form-label">CEP</label>
                <input type="text" class="form-control" id="cep" name="cep" placeholder="{{ $store['cep'] }}">
                @error('cep')
                    <div class='invalid-feedback'><span>{{ $message }}</span></div>
                @enderror
            </div>

            <div class="mb-3 col-md-8">
                <label class="form-label" for="state">Estado</label>
                <input type="tel" class="form-control" id="state" name="state" value="{{ $store['state'] }}">
                @error('state')
                    <div class='invalid-feedback'><span>{{ $message }}</span></div>
                @enderror
            </div>

            <div class="mb-3 col-md-6">
                <label class="form-label" for="city">Cidade</label>
                <input type="tel" class="form-control" id="city" name="city" value="{{ $store['city'] }}">
                @error('city')
                    <div class='invalid-feedback'><span>{{ $message }}</span></div>
                @enderror
            </div>

            <div class="mb-3 col-md-6">
                <label class="form-label" for="district">Bairro</label>
                <input type="tel" class="form-control" id="district" name="district" value="{{ $store['district'] }}">
                @error('district')
                    <div class='invalid-feedback'><span>{{ $message }}</span></div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="street">Rua</label>
                <input type="tel" class="form-control" id="street" name="street" value="{{ $store['street'] }}">
                @error('street')
                    <div class='invalid-feedback'><span>{{ $message }}</span></div>
                @enderror
            </div>

            <div class="mb-3 col-md-4">
                <label class="form-label" for="number_address">Número</label>
                <input type="tel" class="form-control" id="number_address" name="number_address"
                    value="{{ $store['number_address'] }}">
                @error('number_address')
                    <div class='invalid-feedback'><span>{{ $message }}</span></div>
                @enderror
            </div>

            <div class="mb-3 col-md-8">
                <label class="form-label" for="complement">Complemento</label>
                <input type="tel" class="form-control" id="complement" name="complement"
                    value="{{ $store['complement'] }}">
                @error('complement')
                    <div class='invalid-feedback'><span>{{ $message }}</span></div>
                @enderror
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>

        </form>
    </section>
@endsection
