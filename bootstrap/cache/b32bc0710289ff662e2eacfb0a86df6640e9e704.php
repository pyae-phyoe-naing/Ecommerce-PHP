<div class="scrollbar-sidebar">
    <div class="app-sidebar__inner">
        <ul class="vertical-nav-menu">
            <li class="app-sidebar__heading">Dashboards</li>
            <li>
                <a href="/admin" class="<?php echo $__env->yieldContent('dashboard'); ?>">
                    <i class="metismenu-icon feather-home"></i>
                    Dashboard 
                </a>
            </li>
            <li class="app-sidebar__heading">UI Components</li>
            <li>
                <a href="/admin/category" class="<?php echo $__env->yieldContent('category'); ?>">
                    <i class="metismenu-icon feather-grid"></i>
                    Category
                </a>

            </li>

            <li>
                <a href="/admin/subcat" class="<?php echo $__env->yieldContent('subcat'); ?>">
                    <i class="metismenu-icon feather-credit-card"></i>
                    Sub Category
                </a>

            </li>
            <li>
                <a href="/admin/product" class="<?php echo $__env->yieldContent('product'); ?>">
                    <i class="metismenu-icon feather-shopping-bag"></i>
                    Product
                </a>

            </li>
            
        </ul>
    </div>
</div><?php /**PATH C:\xampp\htdocs\PHP-Ecommerce\resources\views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>