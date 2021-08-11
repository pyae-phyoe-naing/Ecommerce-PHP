<?php if(App\Classes\Session::has('error')): ?>
<?php echo e(App\Classes\Session::flash('error','','danger')); ?>

<?php endif; ?>
<?php if(App\Classes\Session::has('success')): ?>
<?php echo e(App\Classes\Session::flash('success','')); ?>

<?php endif; ?><?php /**PATH C:\xampp\htdocs\PHP-Ecommerce\resources\views/share/flash_message.blade.php ENDPATH**/ ?>