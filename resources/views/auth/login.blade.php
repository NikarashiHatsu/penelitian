<x-auth-layout>
    <div class="text-center mb-4">
        <a href="{{ route('index') }}" class="navbar-brand navbar-brand-autodark">
            <img src="{{ asset('icon.png') }}" height="64" alt="" />
        </a>
    </div>

    <x-tabler::form.alerts
        error-title="Terjadi kesalahan"
    />

    <form class="card card-md" action="{{ route('login') }}" method="post" autocomplete="off">
        @csrf
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Masuk ke akun Anda</h2>
            <x-tabler::form.input.text
                label="Alamat Email"
                name="email"
                placeholder="Masukkan Email"
                :value="old('email')"
                required
            />
            <x-tabler::form.input.password
                label="Kata Sandi"
                name="password"
                placeholder="Masukkan Kata Sandi"
                required
            />
            <x-tabler::form.input.checkbox
                label="Ingat saya"
                name="remember_me"
            />
            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">Masuk</button>
            </div>
        </div>
    </form>
    @if (Route::has('register'))
        <div class="text-center text-muted mt-3">
            Belum memiliki akun? <a href="{{ route('register') }}" tabindex="-1">Daftar disini</a>
        </div>
    @endif
</x-auth-layout>
