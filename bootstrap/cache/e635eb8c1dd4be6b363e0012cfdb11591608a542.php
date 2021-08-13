<?php $__env->startSection('title', 'Product'); ?>
<?php $__env->startSection('product', 'mm-active'); ?>
<?php $__env->startSection('content'); ?>

<div class="app-page-title">
<div class="page-title-wrapper">
    <div class="page-title-heading">
        <div class="page-title-icon">
            <i class="feather-shopping-bag icon-gradient bg-mean-fruit">
            </i>
        </div>
        <div> Product </div>
    </div>
</div>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between">
        Product List
        <a href="/admin/product/create" class="btn btn-primary ">create</a>
    </div>
<div class="card-body">

    <table id="subcat" class="table table-responsive-sm" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        

    </table>

</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    $('#subcat').DataTable({
        "displayLength": 5,
        "bLengthChange": false,
        "paging": true
    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP-Ecommerce\resources\views/admin/product/index.blade.php ENDPATH**/ ?>