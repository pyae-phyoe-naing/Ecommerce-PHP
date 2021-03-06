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
<div class="card-header">Create Category</div>
<div class="card-body p-5">
    <?php echo $__env->make('share.flash_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <form action="/admin/category/create" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="<?php echo e(App\Classes\CSRFToken::_token()); ?>">
        <div class="from-group">
            <label for="name">Category Name</label>
            <input type="text" name="name" class="form-control">
            <small class="text text-danger"><strong><?php echo e(App\Classes\Session::error('name')); ?></strong></small>

        </div>

        <div class="form-group mt-3">
            <button class="btn btn-primary">Create</button>
            <a href="/admin/category" class="btn btn-outline-secondary ml-3">Cancel</a>
        </div>

    </form>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP-Ecommerce\resources\views/admin/category/create.blade.php ENDPATH**/ ?>