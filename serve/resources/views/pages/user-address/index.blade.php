@extends('layouts.auth.index')

@section('content')
    <section class="container-form">
        <section class="card-form">
            <div class="section-img">
                <a href={{ route('menu.home') }}>
                    <img src={{ asset('assets/imgs/banner.png') }} alt="Logo">
                </a>
            </div>

            <form method="POST" action={{ route('user.address.store') }} class="form-login">
                @error('error')
                    <div class='invalid-feedback'><span>{{ $message }}</span></div>
                @enderror
                @csrf

                <div class="mb-3">
                    <label for="cep" class="form-label">CEP</label>
                    <input type="tex" class="form-control" id="cep" name="cep" placeholder="00000000"
                        required>
                    @error('cep')
                        <div class='invalid-feedback'><span>{{ $message }}</span></div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="state" class="form-label">Estado</label>
                    <input type="tex" class="form-control" id="state" name="state" placeholder="MG" required>
                    @error('state')
                        <div class='invalid-feedback'><span>{{ $message }}</span></div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="city" class="form-label">Cidade</label>
                    <input type="tex" class="form-control" id="city" name="city" placeholder="Juiz de Fora"
                        required>
                    @error('city')
                        <div class='invalid-feedback'><span>{{ $message }}</span></div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="district" class="form-label">Bairro</label>
                    <input type="tex" class="form-control" id="district" name="district" placeholder="Centro" required>
                    @error('district')
                        <div class='invalid-feedback'><span>{{ $message }}</span></div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="street" class="form-label">Rua</label>
                    <input type="tex" class="form-control" id="street" name="street" placeholder="Rua X" required>
                    @error('street')
                        <div class='invalid-feedback'><span>{{ $message }}</span></div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="number_address" class="form-label">Número</label>
                    <input type="tex" class="form-control" id="number_address" name="number_address" placeholder="100"
                        required>
                    @error('number_address')
                        <div class='invalid-feedback'><span>{{ $message }}</span></div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="complement" class="form-label">Complemento</label>
                    <input type="tex" class="form-control" id="complement" name="complement" placeholder="Referência">
                    @error('complement')
                        <div class='invalid-feedback'><span>{{ $message }}</span></div>
                    @enderror
                </div>

                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">Adicionar endereço</button>
                </div>
            </form>
        </section>

    </section>
@endsection
