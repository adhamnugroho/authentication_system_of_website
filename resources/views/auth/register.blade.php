@extends('auth.layouts.auth');

@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register Card -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="{{ route('registrationAccount') }}" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    <img src="{{ asset('template-user/images/logo.png') }}" alt="*Gambar logo"
                                        role="img">
                                </span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2">Silahkan Membuat Akun 🙏📄</h4>
                        <p class="mb-4">Harap semua kolom diisi dengan benar !</p>

                        <form id="formAuthentication" class="mb-3" action="{{ route('registrationAccountStore') }}"
                            method="POST">

                            @csrf

                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                    placeholder="Masukkan nama lengkap anda disini" autocomplete="name"
                                    value="{{ old('nama_lengkap') }}" autofocus required />
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Masukkan username disini" autocomplete="username" maxlength="50"
                                    value="{{ old('username') }}" required />
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter your email" value="{{ old('email') }}" required />
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" minlength="8" value="{{ old('password') }}" required />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                                    <label class="form-check-label" for="terms-conditions">
                                        Saya menyetujui untuk
                                        <a href="javascript:void(0);">Syarat dan Ketentuan</a>
                                    </label>
                                </div>
                            </div>
                            <button class="btn btn-primary d-grid w-100" id="button-sign-up" disabled>Sign up</button>
                        </form>

                        <p class="text-center">
                            <span>Sudah mempunyai akun?</span>
                            <a href="{{ route('login') }}">
                                <span>Sign In</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- Register Card -->
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        const termsAndConditionInput = document.getElementById("terms-conditions");

        termsAndConditionInput.addEventListener('change', () => {

            document.getElementById("button-sign-up").removeAttribute("disabled");

            if (!termsAndConditionInput.checked) {

                document.getElementById("button-sign-up").setAttribute("disabled", "");
            }
        });
    </script>
@endsection
