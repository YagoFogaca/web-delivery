@extends('layouts.platform-store.index')

@section('content')
    <section class="container-form-create">
        <h4 style="text-align: center">Troque sua senha</h4>

        <form class="row g-3" method="POST"
            action={{ route('store.security.update', ['store' => Auth::guard('store')->user()->id]) }}>
            @method('PATCH')
            @csrf

            @error('error')
                <div class='invalid-feedback'><span>{{ $message }}</span></div>
            @enderror

            @if (session('password'))
                <div class='mb-3 valid-feedback' style="display: block; font-size: 22px; margin-top: 1.25rem">
                    <span>{{ session('password') }}</span>
                </div>
            @endif

            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password" />
            </div>

            <div class="mb-3">
                <label class="form-label" for="password_confirmation">Confirme sua senha</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" />
                @error('password')
                    <div class='invalid-feedback'><span>{{ $message }}</span></div>
                @enderror
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>

        </form>
    </section>
@endsection
