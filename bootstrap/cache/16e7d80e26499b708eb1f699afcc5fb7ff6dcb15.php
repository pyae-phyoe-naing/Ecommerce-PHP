<?php $__env->startSection('cart', 'active'); ?>
<?php $__env->startSection('content'); ?>

<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <div class="card  shadow-sm">
                <div class="card-header">
                    <span class="badge badge-primary mr-3"><i class="feather-shopping-cart"></i></span>
                    Add To Cart List
                </div>
                <div class="card-body">

                </div>
            </div>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
    let noItem =
        `<h6 class='text-warning'><i class="feather-shopping-bag text-primary mr-3"></i> Empty Add To Cart Item</h6>`;

    // Get Add Cart Data
    function fetchCartData() {
        $(".main-container").addClass("d-none");
        $("#facebookG").toggleClass("d-none");
        if (getCartAry() != null && getCartAry().length > 0) {
            $.ajax({
                type: 'POST',
                url: '/cart',
                data: {
                    cart: getCartAry(),
                    // 'token' : "<?php echo e(App\Classes\CSRFToken::_token()); ?>"
                    "token": $('#token').val()
                },
                success: function(response) {
                    let res = JSON.parse(response);
                    console.log(res);
                    if (res.con) {
                        $(".main-container").removeClass("d-none");
                        $("#facebookG").toggleClass("d-none");
                        saveGetServerProducts(res.data);
                    } else {
                        clearCartAry();
                        window.location.href = '/';
                    }
                }
            })
        } else {
            $(".main-container").removeClass("d-none");
            $("#facebookG").toggleClass("d-none");
            $('.card-body').html(noItem);
        }
    }

    function saveGetServerProducts(data) {
        localStorage.setItem('products', JSON.stringify(data));
        let products = JSON.parse(localStorage.getItem('products'));
        showProducts(products);
    }

    function showProducts(products) {

        let count = 1;
        let grandTotal = 0;
        let str = `
            <table class="table table-bordered table-responsive-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Option</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                `;
        if (products.length > 0) {
            products.forEach(product => {
                grandTotal += product.price * product.qty;

                str += '<tr>';
                str += `<td>${count++}</td>`;
                str += `<td>${product.name}</td>`;
                str += `<td><img src="${ product.image }" height="70" alt=""></td>`;
                str += `<td>${product.qty}</td>`;
                str += `<td>${product.price}</td>`;
                str += `<td>${(product.price * product.qty).toFixed(2)}</td>`;
                str += `
                <td class = "text-nowrap">
                 <button onclick="addProductQty(${product.id})" class ="btn btn-sm btn-primary mr-2" > + </button>
                 <button onclick="reducedProductQty(${product.id})" class ="btn btn-sm btn-info" > - </button> 
                </td>`;
                str +=
                    `<td><button onclick="removeProduct(${product.id})" class="btn btn-sm btn-danger"><i class="feather-trash-2"></i></button></td>`;
                str += '</tr>';

            });
            str += '<tr>';
            str += `<td class="text-right mr-3" colspan="5">Grand Total </td>`;
            str += `<td>${grandTotal.toFixed(2)} MMK</td>`;
            str += '</tr>';
            str += '<tr>';
            str +=
                `
                <?php if( App\Classes\Auth::check()): ?>
                <td colspan="7"><a href="/order/confirm" class="float-right btn btn-sm btn-success"><i class="feather-check-circle"></i> checkout</a></td>
                <?php else: ?>
                <td colspan="7"><a href="/user/login" class="float-right btn btn-sm btn-primary">Login <i class="feather-log-in"></i></a></td>
                <?php endif; ?>
                `;
            str += '</tr>';
            str += `</tbody>`;
            str += `</table>`;
            $('.card-body').html(str);
        } else {
            $('.table').attr('class', 'd-none');
            $('.card-body').html(noItem);
        }
    }
    // Add Product Quantity
    function addProductQty(id) {
        let products = JSON.parse(localStorage.getItem('products'));
        products.map(product => {
            if (product.id === id) {
                if (product.qty < product.quantity) {
                    product.qty = product.qty + 1;
                } else {
                    toastAlret('info', 'not enough product count');
                }
            }
        });
        saveGetServerProducts(products);
    }
    // Reduce Product Quantity
    function reducedProductQty(id) {
        let products = JSON.parse(localStorage.getItem('products'));
        products.map(product => {
            if (product.id === id) {
                if (product.qty > 1)
                    product.qty = product.qty - 1;
            }
        });
        saveGetServerProducts(products);
    }
    // Remove Product from List
    function removeProduct(id) {
        let products = JSON.parse(localStorage.getItem('products'));
        products.map(product => {
            if (product.id === id) {
                let ind = products.indexOf(id);
                products.splice(ind, 1);
            }
        });
        removeItemCount(id);
        saveGetServerProducts(products);
    }

    fetchCartData();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP-Ecommerce\resources\views/frontend/show_cart.blade.php ENDPATH**/ ?>