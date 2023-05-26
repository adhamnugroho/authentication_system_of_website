@extends('auth.layouts.auth')

@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="index.html" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    <img src="{{ asset('template-user/images/logo.png') }}" alt="*Gambar Logo"
                                        role="img">
                                </span>
                                {{-- <span class="app-brand-text demo text-body fw-bolder">Sneat</span> --}}
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2">Selamat Datang di Cycle! 👋</h4>
                        <p class="mb-4">Silahkan Log In terlebih dahulu </p>

                        <form id="formAuthentication" class="mb-3" action="{{ route('postLogin') }}" method="POST">

                            @csrf

                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Enter your username" autofocus required />
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                    <a href="{{ route('forgotPassword') }}">
                                        <small>Lupa Password?</small>
                                    </a>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" required />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            {{-- <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me" />
                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                  </div>
                </div> --}}
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100 mb-4" type="submit" id="button-login">Log
                                    in</button>
                            </div>
                        </form>
                        <div class="ps-2 pe-2 mb-3">
                            {{-- <p></p> --}}
                            <div id="g_id_onload"
                                data-client_id="940276537587-ovch5ql7t9oitqlnh32ep9tvoigatpqt.apps.googleusercontent.com"
                                data-context="signin" data-ux_mode="popup" data-callback="doLogin()" data-nonce=""
                                data-itp_support="true">
                            </div>

                            <div class="g_id_signin" data-type="standard" data-shape="pill" data-theme="outline"
                                data-text="signin_with" data-size="large" data-logo_alignment="left">
                            </div>
                        </div>
                        <p class="text-center">
                            <span>Belum mempunyai akun?</span>
                            <a href="{{ route('registrationAccount') }}">
                                <span>Buat Akun</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('keyup', function(event) {
            if (event.key === 'Enter') {

                if (document.getElementById('username').value !== '' && document.getElementById(
                        'password').value !== '') {

                    document.getElementById('button-login').click();
                }
            }
        });
    </script>
@endsection
