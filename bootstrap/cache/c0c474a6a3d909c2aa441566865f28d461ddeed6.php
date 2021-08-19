<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="shortcut icon" href="<?php echo e(asset('backend/images/shoplogo.png')); ?>">

    <link href="<?php echo e(asset('backend/css/main.css')); ?> " rel="stylesheet">
    <link href=" <?php echo e(asset('backend/css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('backend/feather-icons/feather.css')); ?> " rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/vendor/OwlCarousel/dist/assets/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/vendor/OwlCarousel/dist/assets/owl.theme.default.min.css')); ?>">
</head>

<body>

    <div class="bg-light fixed-top">
        <nav class="navbar container navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/"><img src="<?php echo e(asset('backend/images/shoplogo.png')); ?>" class="logo shadow"
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
                        User Login
                    </div>
                    <div class="card-body p-5">
                        <?php echo $__env->make('share.flash_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <form action="/user/login" method="POST">
                            <input type="hidden" name="_token" value="<?php echo e(App\Classes\CSRFToken::_token()); ?>">
                            <div class="form-group">
                                <label for="email">Enter Email</label>
                                <input id="email" required class="form-control" type="email" name="email">
                                <small
                                class="text text-danger"><strong><?php echo e(App\Classes\Session::error('email')); ?></strong></small>
                            </div>
                            <div class="form-group">
                                <label for="password">Enter Password</label>
                                <input id="password" required class="form-control" type="password" name="password">
                                <small
                                class="text text-danger"><strong><?php echo e(App\Classes\Session::error('password')); ?></strong></small>
                            </div>
                            <p>Not yet account ? <a href="/user/register"><strong>Register Here</strong></a></p>
                            <button class="btn btn-primary mr-3">Login</button>
                            <a onclick="history.back();" class="btn btn-outline-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="<?php echo e(asset('backend/js/jquery.min.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('backend/js/script.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/script.js')); ?>"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?php echo e(asset('frontend/vendor/OwlCarousel/dist/owl.carousel.min.js')); ?>"></script>
    <?php echo $__env->make('share.toast', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        if (window.performance) {
        "<?php echo e(App\Classes\Session::remove('errors')); ?>";
    
    }
    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\PHP-Ecommerce\resources\views/frontend/user_login.blade.php ENDPATH**/ ?>