<?php $__env->startSection('title', 'Category'); ?>
<?php $__env->startSection('category', 'mm-active'); ?>
<?php $__env->startSection('content'); ?>
    
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="feather-grid icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div> Category</div>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            Category List
            <a href="/admin/category/create" class="btn btn-primary ">create</a>
        </div>
        <div class="card-body">

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP-Ecommerce\resources\views/admin/category/index.blade.php ENDPATH**/ ?>