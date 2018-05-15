<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold">MAJ Vendor</strong>
                            </span>
                        </span>
                    </a>
                </div>
                <div class="logo-element">
                    MAJ
                </div>
            </li>
            <li class="<?php echo e(isActiveRoute('dashboard')); ?>">
                <a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-th-large"></i> <span
                            class="nav-label">Dashboard</span></a>
            </li>
            <li class="<?php echo e(isActiveRoute('')); ?>">
                <a href="<?php echo e(route('supplier')); ?>"><i class="fa fa-th-large"></i> <span class="nav-label">Supplier</span>
                </a>
            </li>
            <li class="<?php echo e(isActiveRoute('')); ?>">
                <a href="<?php echo e(route('client')); ?>"><i class="fa fa-th-large"></i> <span class="nav-label">Client</span>
                </a>
            </li>
            <li>
                <a href=""><i class="fa fa-th-large"></i> <span class="nav-label">Product</span> <span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="<?php echo e(isActiveRoute('category')); ?>"><a href="<?php echo e(route('category')); ?>">Category</a></li>
                    <li class="<?php echo e(isActiveRoute('subcategory')); ?>"><a href="<?php echo e(route('subcategory')); ?>">Sub Category</a>
                    </li>
                    <li class="<?php echo e(isActiveRoute('brand')); ?>"><a href="<?php echo e(route('brand')); ?>">Brand</a></li>
                    <li class="<?php echo e(isActiveRoute('product')); ?>"><a href="<?php echo e(route('product')); ?>">Product</a></li>
                </ul>
            </li>
            <li>
                <a href=""><i class="fa fa-th-large"></i> <span class="nav-label">Order</span> <span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="<?php echo e(isActiveRoute('status')); ?>"><a href="<?php echo e(route('status')); ?>">Status</a></li>
                    <li class="<?php echo e(isActiveRoute('orders')); ?>"><a href="<?php echo e(route('orders')); ?>">Order</a></li>

                </ul>
            </li>
        </ul>

    </div>
</nav>
