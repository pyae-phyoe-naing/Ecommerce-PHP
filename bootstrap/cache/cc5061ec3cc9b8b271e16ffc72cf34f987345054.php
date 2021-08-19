<?php $__env->startSection('cart', 'active'); ?>
<?php $__env->startSection('content'); ?>

<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <div class="card  shadow-sm">
                <div class="card-header">
                    <span class="badge badge-primary mr-3"><i class="feather-info"></i></span>
                    <span class="text-danger mr-2">
                        <?php echo e(App\Classes\Auth::check() ? App\Classes\Auth::user()->name : 'Account'); ?>

                    </span> : Fill Details
                </div>
                <div class="card-body p-5">
                    <form>
                        <div class="form-group">
                            <label for="phone">Enter Phone</label>
                            <input id="phone" class="form-control" type="number">
                            <small class="text text-danger"><strong id="phoneValid"></strong></small>
                        </div>
                        <div class="form-group">
                            <label for="address">Enter Address</label>
                            <textarea class="form-control" id='address'></textarea>
                            <small class="text text-danger"><strong id="addressValid"></strong></small>
                        </div>
                        <button onclick="checkOut(event)" class="btn btn-primary"><i class="feather-check-circle"></i>
                            Confrim</button>
                        <a href="/cart" class="btn btn-outline-secondary ml-3">Cancel</a>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
    // Checkout
    function checkOut(e) {
        e.preventDefault();
        $(".main-container").addClass("d-none");
        $("#facebookG").toggleClass("d-none");

        let products = JSON.parse(localStorage.getItem('products'));
        let phone = $('#phone').val();
        let address = $('#address').val();

        $.ajax({
            type: 'POST',
            url: '/checkout',
            data: {
                "products": products,
                'phone': phone,
                'address': address,
                "token": $('#token').val()
            },
            success: function(response) {
                let res = JSON.parse(response);

                if (res.validation) {
                    $(".main-container").toggleClass("d-none");
                    $("#facebookG").toggleClass("d-none");
                    if (res.errors.phone) $('#phoneValid').text(res.errors.phone);
                    if (res.errors.address) $('#addressValid').text(res.errors.address);
                } else {
                    $('#phoneValid').text('');
                    $('#addressValid').text('');
                }
                if (res.con) {
                    clearCartAry();
                    localStorage.setItem('products', JSON.stringify([]));
                    window.location.href = `/success/${res.key}/order`;
                }
                if (res.csrf) {
                    $(".main-container").toggleClass("d-none");
                    $("#facebookG").toggleClass("d-none");
                    addCartCount()
                    toastAlret('warning', 'CSRF Attack Occur');
                }
            }
        })
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP-Ecommerce\resources\views/frontend/order_confirm.blade.php ENDPATH**/ ?>