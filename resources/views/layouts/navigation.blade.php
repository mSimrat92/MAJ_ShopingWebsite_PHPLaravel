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
            <li class="{{ isActiveRoute('dashboard') }}">
                <a href="{{ route('dashboard') }}"><i class="fa fa-th-large"></i> <span
                            class="nav-label">Dashboard</span></a>
            </li>
            <li class="{{ isActiveRoute('') }}">
                <a href="{{route('supplier')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Supplier</span>
                </a>
            </li>
            <li class="{{ isActiveRoute('') }}">
                <a href="{{route('client')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Client</span>
                </a>
            </li>
            <li>
                <a href=""><i class="fa fa-th-large"></i> <span class="nav-label">Product</span> <span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="{{ isActiveRoute('category') }}"><a href="{{route('category')}}">Category</a></li>
                    <li class="{{ isActiveRoute('subcategory') }}"><a href="{{route('subcategory')}}">Sub Category</a>
                    </li>
                    <li class="{{ isActiveRoute('brand') }}"><a href="{{route('brand')}}">Brand</a></li>
                    <li class="{{ isActiveRoute('product') }}"><a href="{{route('product')}}">Product</a></li>
                </ul>
            </li>
            <li>
                <a href=""><i class="fa fa-th-large"></i> <span class="nav-label">Order</span> <span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="{{ isActiveRoute('status') }}"><a href="{{route('status')}}">Status</a></li>
                    <li class="{{ isActiveRoute('orders') }}"><a href="{{route('orders')}}">Order</a></li>

                </ul>
            </li>
        </ul>

    </div>
</nav>
