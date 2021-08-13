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

    <table id="product" class="table table-responsive-sm" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Photo</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>CreatedAt</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($val->name); ?></td>
                    <td>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td><small class="badge badge-success">Category</small></td>
                                    <td><small><?php echo e($val->cat->name); ?></small></td>
                                </tr>
                                <tr>
                                    <td><small class="badge badge-success">Sub Cat</small></td>
                                    <td><small><?php echo e($val->subcat->name); ?></small></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td>
                        <img src="<?php echo e($val->image); ?>" height="60" width="60" alt="">
                    </td>
                    <td><?php echo e($val->price); ?> MMK</td>
                    <td><?php echo e($val->quantity); ?></td>
                    <td><?php echo e(Carbon\Carbon::parse($val->created_at)->diffForHumans()); ?></td>
                    <td class="text-nowrap">
                        <a href="/admin/product/<?php echo e($val->id); ?>/edit" class="btn btn-sm btn-info"><i class="feather-edit"></i></a>
                        <a onclick="myDel(<?php echo e($val->id); ?>)" class="btn btn-sm btn-danger ml-3"><i class="feather-trash-2 text-white"></i></a>
                    </td>

                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>

    </table>
  <div class="float-right mt-3 paginate"> <?php echo $pages; ?></div>
</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    $('#product').DataTable({
       "paging": false
    });
    // Delete Category
    function myDel(id) {
        Swal.fire({
            title: 'Are you sure delete?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = `/admin/product/${id}/delete`;
            }
        })
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP-Ecommerce\resources\views/admin/product/index.blade.php ENDPATH**/ ?>