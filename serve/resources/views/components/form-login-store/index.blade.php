<section class="container-form">
    <section class="card-form">
        <div class="section-img">
            <img src={{ asset('assets/imgs/banner.png') }} alt="Logo">
        </div>
        <form method="POST" action={{ route('store.auth') }} class="form-login">
            @error('auth')
                <div class='invalid-feedback'><span>{{ $message }}</span></div>
            @enderror
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
                @error('email')
                    <div class='invalid-feedback'><span>{{ $message }}</span></div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
                @error('password')
                    <div class='invalid-feedback'><span>{{ $message }}</span></div>
                @enderror
            </div>

            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Login</button>
            </div>
        </form>
    </section>

</section>
