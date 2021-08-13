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
<div class="card-header">Edit Product</div>
<div class="card-body px-5">
    <?php echo $__env->make('share.flash_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <form action="/admin/product/<?php echo e($product->id); ?>/edit" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="<?php echo e(App\Classes\CSRFToken::_token()); ?>">
        <!-- Name and Price -->
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="from-group">
                    <label for="name">Name</label>
                    <input value="<?php echo e($product->name); ?>" type="text" name="name" class="form-control">              
                    <small class="text text-danger"><strong><?php echo e(App\Classes\Session::error('name')); ?></strong></small>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="from-group">
                    <label for="price">Price</label>
                    <input type="number" value="<?php echo e($product->price); ?>" name="price" class="form-control">
                    <small class="text text-danger"><strong><?php echo e(App\Classes\Session::error('price')); ?></strong></small>
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
                            <option <?php echo e($product->cat_id == $val->id ? "selected" : ''); ?> value="<?php echo e($val->id); ?>"><?php echo e($val->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <small class="text text-danger"><strong><?php echo e(App\Classes\Session::error('cat_id')); ?></strong></small>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="from-group">
                    <label for="subcat">Sub Cat</label>
                    <select name="sub_cat_id" id="subcat" class="form-control">
                    </select>
                    <small class="text text-danger"><strong><?php echo e(App\Classes\Session::error('sub_cat_id')); ?></strong></small>
                </div>
            </div>
        </div>
        <!--Image and Quantity -->
        <div class="row">
            <div class="col-md-5 col-12">
                <div class="from-group">
                    <label for="file">Photo</label>
                    <input type="file" name="file" class="form-control p-1">
                    <small class="text text-danger"><strong><?php echo e(App\Classes\Session::error('file')); ?></strong></small>
                </div>
            </div>
            <div class="col-12 col-md-1 d-flex justify-content-center align-items-center">
                <img src="<?php echo e($product->image); ?>" height="50" width="50" alt="">
            </div>
            <div class="col-md-6 col-12">
                <div class="from-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" value="<?php echo e($product->quantity); ?>" name="quantity" class="form-control">
                    <small class="text text-danger"><strong><?php echo e(App\Classes\Session::error('quantity')); ?></strong></small>
                </div>
            </div>
        </div>
        <!--Description -->
        <div class="row mt-2">
            <div class="col-12">
                <div class="from-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description"  class=" form-control"><?php echo e($product->description); ?></textarea>
                    <small class="text text-danger"><strong><?php echo e(App\Classes\Session::error('description')); ?></strong></small>
                </div>
            </div>
        </div>
        <!--Create Button -->
        <div class="form-group mt-3">
            <button class="btn btn-primary">Update</button>
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
      let subcatId = "<?php echo e($product->sub_cat_id); ?>";
      
      for(let sub of subs){
           let sel = subcatId == sub.id ? "selected" : '';
           console.log(sel);
           console.log(sub.id);
           console.log(subcatId);
            str += `<option ${sel}   value="${sub.id}">${sub.name}</option>`;
      }
      console.log(str);
      document.getElementById('subcat').innerHTML = str;
    }
    let selected = "<?php echo e($product->cat_id); ?>";
   filterSubCat(selected)
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP-Ecommerce\resources\views/admin/product/edit.blade.php ENDPATH**/ ?>