<div class="bg-light fixed-top">
    <nav class="navbar container navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/"><img src="<?php echo e(asset('backend/images/shoplogo.png')); ?>" class="logo shadow"
                alt=""></a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?php echo $__env->yieldContent('home'); ?>">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item <?php echo $__env->yieldContent('cart'); ?>">
                    <a href="/cart" class="nav-link">Cart <span id="cart_count" class="cart"></span></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo e(App\Classes\Auth::check() ? App\Classes\Auth::user()->name : 'Account'); ?>

                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php if(App\Classes\Auth::check()): ?>
                            <a class="dropdown-item" href="/">Profile</a>
                            <div class="dropdown-divider"></div>
                            <a onclick="clearAll()" class="dropdown-item" href="/user/logout">Logout</a>
                        <?php else: ?>
                            <a class="dropdown-item" href="/user/register">Register</a>
                            <a class="dropdown-item" href="/user/login">Login</a>
                        <?php endif; ?>

                    </div>
                </li>

            </ul>
            <form method="GET" action="/" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
</div>
<script>
    function clearAll() {
        clearCartAry();
        localStorage.setItem('products', JSON.stringify([]));
    }
</script>
<?php /**PATH C:\xampp\htdocs\PHP-Ecommerce\resources\views/frontend/layouts/navbar.blade.php ENDPATH**/ ?>