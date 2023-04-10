<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->

    {{-- CSRF --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cycle</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('template-user/css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('template-user/css/style.css') }}">
    <!-- button custom css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('template-user/css/button-custom.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('template-user/css/responsive.css') }}">
    <!-- fevicon -->
    <link rel="icon" href="{{ asset('template-user/images/fevicon.png') }}" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('template-user/css/jquery.mCustomScrollbar.min.css') }}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- owl stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Raleway:400,700,800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('template-user/css/owl.carousel.min.css') }}">
    <link rel="stylesoeet" href="{{ asset('template-user/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">

    {{-- SweetAlert --}}
    <link rel="stylesheet" href="{{ asset('template-admin/assets/vendor/libs/sweetalert2/dist/sweetalert2.min.css') }}">

    {{-- route javascript --}}
    @routes

</head>

<body>
    <!-- header section start -->
    <div class="header_section header_bg">
        @include('user.layouts.header')

    </div>

    {{-- content --}}
    @yield('content')

    {{-- Footer --}}
    @include('user.layouts.footer')

    <!-- Javascript files-->
    <script src="{{ asset('template-user/js/jquery.min.js') }}"></script>
    <script src="{{ asset('template-user/js/popper.min.js') }}"></script>
    <script src="{{ asset('template-user/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template-user/js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('template-user/js/plugin.js') }}"></script>
    <!-- sidebar -->
    <script src="{{ asset('template-user/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('template-user/js/custom.js') }}"></script>
    <!-- javascript -->
    <script src="{{ asset('template-user/js/owl.carousel.js') }}"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>

    {{-- SweetAlert --}}
    <script src="{{ asset('template-admin/assets/vendor/libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <script>
        // Template Toast dengan Sweet Alert
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3700,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });



        @if (Session::has('status'))

            @if (Session::get('status') == 'success')

                Toast.fire({

                    icon: '{{ Session::get('status') }}',
                    title: '{{ Session::get('message') }}',
                })
            @else

                Toast.fire({

                    icon: '{{ Session::get('status') }}',
                    title: '{{ Session::get('message') }}',
                })
            @endif
        @endif

        function logout() {

            swal.fire({
                icon: 'warning',
                title: 'Anda Yakin Ingin Logout?',
                showCancelButton: true,
                cancelButtonText: 'Batal',
                confirmButtonText: 'Yakin!',
            }).then((result) => {

                if (result.value) {

                    window.location.replace("{{ route('logout') }}");
                }
            });
        }
    </script>

    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";

        }

        $("#main").click(function() {
            $("#navbarSupportedContent").toggleClass("nav-normal")
        })
    </script>
</body>

</html>
