<section class="container-form">
    <section class="card-form">
        <div class="section-img">
            <a href={{ route('menu.home') }}>
                <img src={{ asset('assets/imgs/banner.png') }} alt="Logo">
            </a>
        </div>
        <form method="POST" action={{ route('store.auth') }} class="form-login">
            @error('error')
                <div class='invalid-feedback'><span>{{ $message }}</span></div>
            @enderror
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="fogaca@email.com"
                    required>
                @error('email')
                    <div class='invalid-feedback'><span>{{ $message }}</span></div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Sua senha"
                    required>
                @error('password')
                    <div class='invalid-feedback'><span>{{ $message }}</span></div>
                @enderror
            </div>

            <div class="mb-3">
                <p style="font-size: 14px;">Ainda não tem conta? <a href={{ route('user.create') }}>Crie agora</a></p>
            </div>

            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Login</button>
            </div>
        </form>
    </section>

</section>
