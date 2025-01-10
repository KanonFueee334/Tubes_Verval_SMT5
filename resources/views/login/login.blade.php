<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Page</title>

    <link rel="icon" type="image/png" href="{{ asset('login_form/images/icons/favicon.ico') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('login_form/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('login_form/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login_form/vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login_form/vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login_form/vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login_form/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login_form/css/main.css') }}">
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ asset('login_form/images/img-02.png') }}" alt="IMG">
                </div>

                <form class="login100-form validate-form" action="{{ route('login') }}" method="POST">
                    @csrf

                    <span class="login100-form-title">Selamat Datang</span>

                    <!-- Pesan error global -->
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- Nama Pengguna -->
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="nama_pengguna" placeholder="Nama Pengguna">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                        {{-- @error('nama_pengguna') --}}
                        {{--     <div class="text-danger mt-2">{{ $message }}</div> --}}
                        {{-- @enderror --}}
                    </div>

                    <!-- Kata Sandi -->
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="password" name="password" placeholder="Kata Sandi">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                        {{-- @error('password') --}}
                        {{--                       <div class="text-danger mt-2">{{ $message }}</div> --}}
                        {{--                   @enderror --}}
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">Masuk</button>
                    </div>
                    <br><br><br><br><br><br>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('login_form/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('login_form/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('login_form/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('login_form/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('login_form/js/main.js') }}"></script>
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: "Success",
                    text: "{{ session('success') }}",
                    icon: "success",
                    timer: 3000
                });
            });
        </script>
    @endif
</body>

</html>
