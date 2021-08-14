<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $__env->yieldContent('title','Dashboard'); ?></title>
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
    <div>
        <?php echo $__env->make('frontend.layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <?php echo $__env->yieldContent('modal'); ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('backend/js/script.js')); ?>"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?php echo e(asset('frontend/vendor/OwlCarousel/dist/owl.carousel.min.js')); ?>"></script>
    <?php echo $__env->make('share.toast', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('scripts'); ?>
    <script>
        if (window.performance) {
            "<?php echo e(App\Classes\Session::remove('errors')); ?>"
        }
    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\PHP-Ecommerce\resources\views/frontend/layouts/app.blade.php ENDPATH**/ ?>