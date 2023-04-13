@extends('auth.layouts.auth')

@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-4">
                <!-- Forgot Password -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="index.html" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    <img src="{{ asset('template-user/images/logo.png') }}" alt="*Gambar Logo"
                                        role="img">
                                </span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2">Reset Password 🔑🔄</h4>
                        <p class="mb-4">Masukkan password dengan benar pada kedua kolom!</p>
                        <form id="formAuthentication" class="mb-3" action="{{ route('postResetPassword') }}"
                            method="POST">

                            @csrf

                            <input type="hidden" name="email" value="{{ $email }}">
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" minlength="8" required />
                                    <span class="input-group-text
                                        cursor-pointer"><i
                                            class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password-confirm">Konfirmasi Password</label>
                                    <small class="text-right" id="checkInputInfo"></small>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password-confirm" class="form-control" name="passwordConfirm"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password-confirm" minlength="8" required />
                                </div>
                            </div>
                            <button class="btn btn-primary d-grid w-100">Lanjut!</button>
                        </form>
                        <div class="text-center">
                            <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
                                <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                                Kembali ke halaman login
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /Forgot Password -->
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        const passwordConfirm = document.getElementById("password-confirm");
        passwordConfirm.onpaste = (event) => event.preventDefault();

        const password = document.getElementById("password");
        password.oncopy = (event) => event.preventDefault();

        // front end validation input password
        passwordConfirm.addEventListener('keyup', () => {
            const checkInputInfo = document.getElementById("checkInputInfo");

            let passwordValue = password.value;
            let passwordConfirmValue = passwordConfirm.value;

            if (passwordValue != "" && passwordValue.length >= 8) {
                if (passwordValue !== passwordConfirmValue) {

                    checkInputInfo.innerHTML = "Belum-Sesuai";

                    checkInputInfo.classList.remove("text-success");
                    checkInputInfo.classList.add("text-danger");

                    passwordConfirm.classList.remove("border-success");
                    passwordConfirm.classList.add("border-danger");

                    return;
                }

                checkInputInfo.innerHTML = "Sesuai";
                checkInputInfo.classList.remove("text-danger");
                checkInputInfo.classList.add("text-success");

                passwordConfirm.classList.remove("border-danger");
                passwordConfirm.classList.add("border-success");
            }
        });
    </script>
@endsection
