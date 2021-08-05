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
            <table id="category" class="table table-responsive-sm" style="width:100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Created At</th>
                    <th>Control</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($val->name); ?></td>
                    <td><?php echo e(Carbon\Carbon::parse($val->created_at)->diffForHumans()); ?></td>
                    <td>
                        <a href="#" class="bt btn-sm btn-info"><i class="feather-edit"></i></a>
                        <a href="#" class="bt btn-sm btn-danger"><i class="feather-trash-2"></i></a>


                    </td>
                    <td>
                        <a href="#" class="btn btn-success btn-sm"><i class="feather-plus-circle"></i></a>
                    </td>

                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>

            </table>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>

        $(document).ready(function() {
            $('#category').DataTable({
                "displayLength": 5,
                "bLengthChange": false,

            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP-Ecommerce\resources\views/admin/category/index.blade.php ENDPATH**/ ?>