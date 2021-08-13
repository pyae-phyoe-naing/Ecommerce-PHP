<?php $__env->startSection('title', 'Create Product'); ?>
<?php $__env->startSection('product', 'mm-active'); ?>
<?php $__env->startSection('content'); ?>

<div class="app-page-title">
<div class="page-title-wrapper">
    <div class="page-title-heading">
        <div class="page-title-icon">
            <i class="feather-shopping-bag icon-gradient bg-mean-fruit">
            </i>
        </div>
        <div> Product</div>
    </div>
</div>
</div>

<div class="card">
<div class="card-header">Create Product</div>
<div class="card-body px-5">
    <?php echo $__env->make('share.flash_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <form action="/admin/product/create" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="<?php echo e(App\Classes\CSRFToken::_token()); ?>">
        <!-- Name and Price -->
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="from-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control">
                    <small
                        class="text text-danger"><strong><?php echo e(App\Classes\Session::error('name')); ?></strong></small>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="from-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" class="form-control">
                    <small
                        class="text text-danger"><strong><?php echo e(App\Classes\Session::error('price')); ?></strong></small>
                </div>
            </div>
        </div>
        <!-- Cat and SubCat -->
        <div class="row my-2">
            <div class="col-md-6 col-12">
                <div class="from-group">
                    <label for="cat">Category</label>
                    <select onchange="catChange(event)" name="cat_id" id="cat" class="form-control">
                        <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($val->id); ?>"><?php echo e($val->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <small
                        class="text text-danger"><strong><?php echo e(App\Classes\Session::error('cat_id')); ?></strong></small>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="from-group">
                    <label for="subcat">Sub Cat</label>
                    <select name="sub_cat_id" id="subcat" class="form-control">
                        <?php $__currentLoopData = $subcats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($val->id); ?>"><?php echo e($val->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <small
                        class="text text-danger"><strong><?php echo e(App\Classes\Session::error('sub_cat_id')); ?></strong></small>
                </div>
            </div>
        </div>
        <!--Image and Quantity -->
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="from-group">
                    <label for="file">Photo</label>
                    <input type="file" name="file" class="form-control p-1">
                    <small
                        class="text text-danger"><strong><?php echo e(App\Classes\Session::error('file')); ?></strong></small>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="from-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" class="form-control">
                    <small
                        class="text text-danger"><strong><?php echo e(App\Classes\Session::error('quantity')); ?></strong></small>
                </div>
            </div>
        </div>
        <!--Description -->
        <div class="row mt-2">
            <div class="col-12">
                <div class="from-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" " class=" form-control"></textarea>
                    <small
                        class="text text-danger"><strong><?php echo e(App\Classes\Session::error('description')); ?></strong></small>
                </div>
            </div>
        </div>
        <!--Create Button -->
        <div class="form-group mt-3">
            <button class="btn btn-primary">Create</button>
            <a href="/admin/product" class="btn btn-outline-secondary ml-3">Cancel</a>
        </div>

    </form>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
    let cats = "<?php echo e($cats); ?>";
    cats = cats.replace(/&quot;/g, "\"");
    cats = JSON.parse(cats);

    let subcats = "<?php echo e($subcats); ?>";
    subcats = subcats.replace(/&quot;/g, "\"");
    subcats = JSON.parse(subcats);

    let catChange = (e)=>{
        let catId = e.target.value;
        filterSubCat(catId);
    }
    let filterSubCat = (id)=>{
      let subs =  subcats.filter(s => s.cat_id == id);
      let str = '';
      for(let sub of subs){
           str += `<option value="${sub.id}">${sub.name}</option>`;
      }
      document.getElementById('subcat').innerHTML = str;
    }
   filterSubCat(cats[0].id);
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP-Ecommerce\resources\views/admin/product/create.blade.php ENDPATH**/ ?>