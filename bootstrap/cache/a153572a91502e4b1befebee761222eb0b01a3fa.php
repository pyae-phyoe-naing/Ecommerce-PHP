<?php $__env->startSection('cart', 'active'); ?>
<?php $__env->startSection('content'); ?>
<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <div class="card  mt-5 shadow">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="text-success d-inline">Successfully Order Send ...</h5>
                   <span class="badge badge-primary"> <i class="feather-message-square"></i> </span>
                </div>
                <div class="card-body">
                    <h6>Admin will contact you soon !</h6>
                </div>
                <div class="card-footer">
                    <a href="/" class="btn-success btn">I Know</a>
                </div>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
 
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP-Ecommerce\resources\views/frontend/order_success.blade.php ENDPATH**/ ?>