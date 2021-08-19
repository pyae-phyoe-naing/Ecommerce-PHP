<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Register</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="shortcut icon" href="{{ asset('backend/images/shoplogo.png') }}">

    <link href="{{ asset('backend/css/main.css') }} " rel="stylesheet">
    <link href=" {{ asset('backend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/feather-icons/feather.css') }} " rel="stylesheet">
</head>

<body>

    <div class="bg-light fixed-top">
        <nav class="navbar container navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/"><img src="{{ asset('backend/images/shoplogo.png') }}" class="logo shadow"
                    alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/"><i class="feather-shopping-cart text-primary"
                                style="font-size: 23px"></i></span></a>
                    </li>

                </ul>

            </div>
        </nav>
    </div>
    <div class="container" style="margin-top: 100px">
        <div class="row justify-content-center">
            <div class="col-md-6 col-12">
                <div class="card shadow">
                    <div class="card-header">
                        User Register
                    </div>
                    <div class="card-body p-5">
                        @include('share.flash_message')
                        <form action="/user/register" method="POST">
                            <input type="hidden" name="_token" value="{{ App\Classes\CSRFToken::_token() }}">

                            <div class="form-group">
                                <label for="name">Enter Name</label>
                                <input id="name" class="form-control" required type="text" name="name">
                                <small
                                    class="text text-danger"><strong>{{ App\Classes\Session::error('name') }}</strong></small>

                            </div>
                            <div class="form-group">
                                <label for="email">Enter Email</label>
                                <input id="email" class="form-control" required type="email" name="email">
                                <small
                                    class="text text-danger"><strong>{{ App\Classes\Session::error('email') }}</strong></small>

                            </div>

                            <div class="form-group">
                                <label for="password">Enter Password</label>
                                <input id="password" class="form-control" required type="password" name="password">
                                <small
                                    class="text text-danger"><strong>{{ App\Classes\Session::error('password') }}</strong></small>

                            </div>

                            <div class="form-group">
                                <label for="password">Enter Confirm Password</label>
                                <input id="password" class="form-control" required type="password" name="confirm_password">
                                <small
                                    class="text text-danger"><strong>{{ App\Classes\Session::error('confirm_password') }}</strong></small>

                            </div>


                            <p>Already have account ? <a href="/user/login"><strong>Login Here</strong></a></p>
                            <button class="btn btn-primary mr-3">Register</button>
                            <a onclick=" history.back();" class="btn btn-outline-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('backend/js/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('backend/js/script.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @include('share.toast')
<script>
    if (window.performance) {
    "{{ App\Classes\Session::remove('errors') }}";

}
</script>
</body>

</html>
