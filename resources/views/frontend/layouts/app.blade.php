<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title','Dashboard')</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="shortcut icon" href="{{ asset('backend/images/shoplogo.png') }}">

    <link href="{{ asset('backend/css/main.css') }} " rel="stylesheet">
    <link href=" {{ asset('backend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/feather-icons/feather.css') }} " rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/OwlCarousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/OwlCarousel/dist/assets/owl.theme.default.min.css') }}">
</head>

<body>
    <div>
        @include('frontend.layouts.navbar')
        @yield('content')
    </div>
    @yield('modal')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('backend/js/script.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('frontend/vendor/OwlCarousel/dist/owl.carousel.min.js') }}"></script>
    @include('share.toast')
    @yield('scripts')
    <script>
        if (window.performance) {
            "{{ App\Classes\Session::remove('errors') }}"
        }
    </script>
</body>

</html>
