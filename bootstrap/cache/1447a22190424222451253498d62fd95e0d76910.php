<?php if(App\Classes\Session::has('ok') || isset($ok)): ?>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: 'success',
        title: "<?php echo e($ok ?? App\Classes\Session::toast('ok')); ?>"
    })
</script>
<?php endif; ?>
<?php if(App\Classes\Session::has('fail') || isset($fail)): ?>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: 'error',
        title: "<?php echo e($fail ?? App\Classes\Session::toast('fail')); ?>"
    })
</script>
<?php endif; ?>
<?php if(App\Classes\Session::has('info') || isset($info)): ?>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: 'info',
        title: "<?php echo e($info ?? App\Classes\Session::toast('info')); ?>"
    })
</script>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\PHP-Ecommerce\resources\views/share/toast.blade.php ENDPATH**/ ?>