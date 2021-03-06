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
                        <span onclick="editCat('<?php echo e($val->id); ?>','<?php echo e($val->name); ?>')"
                            class="bt btn-sm btn-info"><i class="feather-edit"></i></span>
                        <a onclick="myDel(<?php echo e($val->id); ?>)" class="bt btn-sm btn-danger"><i
                                class="feather-trash-2 text-white"></i></a>
                    </td>
                    <td>
                        <a onclick="createSubCatModal(<?php echo e($val->id); ?>,'<?php echo e($val->name); ?>')"
                            class="btn btn-success btn-sm text-white"><i class="feather-plus-circle"></i></a>
                    </td>

                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>

    </table>
    <div class="paginate mt-3 float-right">
        <?php echo $pages; ?>

    </div>
</div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('modal'); ?>
<!-- Category Edit Modal Start  -->

<div class="modal fade cat_edit" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
        </div>
        <div class="modal-body">
            <form id="myCatEditForm">
                <input type="hidden" id="cat_edit_token" value="<?php echo e(App\Classes\CSRFToken::_token()); ?>">
                <input type="hidden" id="cat_id">
                <div class="form-group">
                    <label for="cat_name">Category Name</label>
                    <input type="text" id='cat_name' class="form-control">
                    <small class="text text-danger"><strong id='valid_cat'></strong></small>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button form="myCatEditForm" onclick="updateCat(event)" class="btn btn-primary">Update</button>
        </div>
    </div>
</div>
</div>
<!-- Category Edit Modal End  -->

<!-- CSub Category Create Modal Start  -->

<div class="modal fade sub_cat" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create Sub Category</h5>
        </div>
        <div class="modal-body">
            <form id="create_sub_cat">
                <input type="hidden" id="subcat_token" value="<?php echo e(App\Classes\CSRFToken::_token()); ?>">
                <input type="hidden" id="parent_cat_id">
                <div class="form-group">
                    <label for="cat_name">Category Name</label>
                    <input type="text" readonly id='parent_cat_name' class="form-control">
                </div>
                <div class="form-group">
                    <label for="cat_name">Sub Category Name</label>
                    <input required type="text" id='sub_cat_name' class="form-control">
                    <small class="text text-danger"><strong id='valid_subcat'></strong></small>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button form="create_sub_cat" onclick="createSubCat(event)" class="btn btn-primary">Create</button>
        </div>
    </div>
</div>
</div>
<!-- Sub Category Create Modal End  -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
    $('#category').DataTable({
        "displayLength": 5,
        "bLengthChange": false,
        paging: false
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
                window.location = `/admin/category/${id}/delete`;
            }
        })
    }
    // Edit Category
    function editCat(id, name) {
        $('#cat_id').val(id);
        $('#cat_name').val(name);
        $('#valid_cat').text('');
        $('.cat_edit').modal('show');
    }

    function updateCat(event) {
        event.preventDefault();

        var id = $('#cat_id').val();
        var token = $('#cat_edit_token').val();
        var name = $('#cat_name').val();
        if (name === '') {
            $('#valid_cat').text('Name field is required');
        } else {
            if (name.length < 3) {
                $('#valid_cat').text('Name is at least 3 character');
            } else {
                $.ajax({
                    type: 'POST',
                    url: `/admin/category/${id}/unique`,
                    data: {
                        id,
                        name
                    },
                    success: function(response) {
                        var res = JSON.parse(response);
                        if (!res.success) {
                            $('#valid_cat').text(res.message);
                        } else {
                            $('.cat_edit').modal('hide');
                            $.ajax({
                                type: 'POST',
                                url: `/admin/category/${id}/update`,
                                data: {
                                    id,
                                    token,
                                    name
                                },
                                success: function(response) {
                                    var res = JSON.parse(response);
                                    if (res.success) {
                                        location.reload();
                                    } else {
                                        toastModal('error', 'Error...', res.message);
                                    }
                                }
                            })
                        }
                    },

                });


            }
        }
    }

    // Create Sub Cat
    function createSubCatModal(cat_id, name) {
        $('#parent_cat_id').val(cat_id);
        $('#parent_cat_name').val(name);
        $('#valid_subcat').text('');
        $('#sub_cat_name').val('');
        $('.sub_cat').modal('show')
    }

    function createSubCat(event) {
        event.preventDefault();

        var parentId = $('#parent_cat_id').val();
        var name = $('#sub_cat_name').val();
        var token = $('#subcat_token').val();

        if (name === '') {
            $('#valid_subcat').text('name field is required');
        } else {
            if (name.length < 3) {
                $('#valid_subcat').text('name field is at least 3 character');
            } else {
                $.ajax({
                    type: 'POST',
                    url: `/admin/subcat/create`,
                    data: {
                        cat_id: parentId,
                        name: name,
                        token: token
                    },
                    success: function(response) {
                        var res = JSON.parse(response);
                        if (res.validate === false) {
                            $('#valid_subcat').text(res.message.name);
                        }
                        if (res.success) {
                            $('.sub_cat').modal('hide');
                            window.location.href ='/admin/subcat';
                        } 
                        if(res.success === false) {
                            $('.sub_cat').modal('hide');
                            toastModal('error', 'Error...', res.message);
                        }

                    }
                });
            }
        }
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP-Ecommerce\resources\views/admin/category/index.blade.php ENDPATH**/ ?>