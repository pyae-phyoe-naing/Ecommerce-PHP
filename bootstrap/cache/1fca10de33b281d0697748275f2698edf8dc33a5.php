<?php $__env->startSection('title', 'Sub Category'); ?>
<?php $__env->startSection('order', 'mm-active'); ?>
<?php $__env->startSection('content'); ?>
    
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="feather-info icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Order Detail</div>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header">
            Order Detail List
        </div>
        <div class="card-body">

            <table id="subcat" class="table table-responsive-sm" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th class='text-nowrap'>Delivery Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $order_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($key+1); ?></td>
                            <td><?php echo e($val->product_name); ?></td>
                            <td><?php echo e($val->price); ?> MMK</td>
                            <td><?php echo e($val->quantity); ?></td>
                            <td><?php echo e($val->quantity * $val->price); ?> MMK</td>
                            <td>
                              
                                <?php if($val->is_send == 0): ?>
                                    <a href="/admin/order/status/<?php echo e($val->id); ?>" class="btn btn-sm btn-danger">
                                        <i class="feather-minus-circle"></i> Not yet Sent
                                    </a>
                                <?php else: ?>
                                    <a href="/admin/order/status/<?php echo e($val->id); ?>" class="btn btn-sm btn-success">
                                        <i class="feather-check-circle"></i> Send Done
                                    </a>
                                <?php endif; ?>

                            </td>

                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>

            </table>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('modal'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        $('#subcat').DataTable({
            "displayLength":1,
            "bLengthChange": false,
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
                    window.location = `/admin/subcat/${id}/delete`;
                }
            })
        }
        // Edit Category
        function editCat(id, name, parent_name) {
            $('#subcat_id').val(id);
            $('#sub_cat_name').val(name);
            $('#parent_cat_name').val(parent_name);
            $('#valid_subcat').text('');
            $('.subcat_edit').modal('show');
        }

        function updateCat(event) {
            event.preventDefault();

            var token = $('#subcat_token').val();
            var id = $('#subcat_id').val();
            var name = $('#sub_cat_name').val();
            if (name === '') {
                $('#valid_subcat').text('Name field is required');
            } else {
                if (name.length < 3) {
                    $('#valid_subcat').text('Name is at least 3 character');
                } else {
                    $.ajax({
                        type: 'POST',
                        url: `/admin/subcat/${id}/update`,
                        data: {
                            id,
                            token,
                            name
                        },
                        success: function(response) {
                            var res = JSON.parse(response);
                            if (res.success) {
                                $('.subcat_edit').modal('hide');
                                location.reload();
                            } else {
                                $('.subcat_edit').modal('hide');
                                toastModal('error', 'Error...', res.message);
                            }
                        }
                    })
                }
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP-Ecommerce\resources\views/admin/order/order_detail.blade.php ENDPATH**/ ?>