<?php $__env->startSection('home', 'active'); ?>
<?php $__env->startSection('content'); ?>
<div class="container my-5">
    <div class="row justify-content-center" style="height: 350px">
        <div class="col-12">
            <div class="card shadow ">
                <div class="card-header d-flex justify-content-between">
                    Ecommerce
                    <a href="#" class="btn btn-primary btn-sm"><i class="feather-shopping-bag"></i></a>

                </div>
                <div class="card-body px-5">
                    <div class="owl-carousel">
                        <?php $__currentLoopData = $carousel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="owl-tem mb-2">
                                <div class="card shadow">
                                    <div class="card-body p-5">
                                        <p class="d-flex justify-content-center p-0 m-0">
                                            <img src="<?php echo e($item->image); ?>" height="100" alt="">
                                        </p>
                                        <hr>
                                        <p class="mb-0 d-flex justify-content-between">
                                            <span
                                                class="badge badge-danger "><strong><?php echo e($item->price); ?></strong>KS</span>
                                            <span class=""><strong><?php echo e($item->name); ?></strong></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header">
                    All Product
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-3 col-md-6 col-12 mb-5">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <?php echo e($item->name); ?>

                                    </div>
                                    <div class="card-body">
                                        <p class="text-center">
                                            <img src="<?php echo e($item->image); ?>" width="150" height="130"
                                                alt="<?php echo e($item->name); ?>">
                                        </p>

                                    </div>
                                    <div class="card-footer d-flex justify-content-between">
                                        <a href="product/<?php echo e($item->id); ?>/detail" class="btn btn-primary btn-sm"><i class="feather-eye"></i></a>
                                        <span><strong class="text-info"><?php echo e($item->price); ?></strong> MMK</span>
                                        <span onclick="addCart(<?php echo e($item->id); ?>)" class="btn btn-primary btn-sm"><i
                                                class="feather-shopping-cart"></i></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 shadow-sm">
            <div class="paginate float-right"><?php echo $pages; ?></div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
    $(document).ready(function() {
        $(".owl-carousel").owlCarousel({
            loop: true,
            rtl: true,
            margin: 10,
            responsiveClass: true,
            autoplay: true,
            autoplayTimeout: 1500,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1,
                    loop: true
                },
                600: {
                    items: 2,
                    loop: true
                },
                1000: {
                    items: 3,
                    loop: true
                }
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP-Ecommerce\resources\views/frontend/welcome.blade.php ENDPATH**/ ?>