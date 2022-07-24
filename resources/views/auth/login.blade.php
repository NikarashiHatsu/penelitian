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
            <div class="mb-3">
                <label class="form-label">Alamat Email</label>
                <input type="email" class="form-control" placeholder="Masukkan Email" name="email" />
            </div>
            <div class="mb-2">
                <label class="form-label">
                    Kata Sandi
                    @if (Route::has('password.request'))
                        <span class="form-label-description">
                            <a href="{{ route('password.request') }}">Lupa kata sandi?</a>
                        </span>
                    @endif
                </label>
                <div class="input-group input-group-flat">
                    <input name="password" type="password" class="form-control" placeholder="Kata Sandi" autocomplete="off">
                    <span class="input-group-text">
                        <a href="javascript:void(0)" class="link-secondary" title="Show password" data-bs-toggle="tooltip">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <circle cx="12" cy="12" r="2" />
                                <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                            </svg>
                        </a>
                    </span>
                </div>
            </div>
            <div class="mb-2">
                <label class="form-check">
                    <input type="checkbox" class="form-check-input" name="remember_name" />
                    <span class="form-check-label">Ingat Saya</span>
                </label>
            </div>
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
