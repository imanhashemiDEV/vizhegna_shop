<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{url('panel/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fa fa-folder"></i>
                            <p>
                                دسته بندی ها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('categories.create')}}" class="nav-link">
                                    <i class="fa fa-plus-circle nav-icon"></i>
                                    <p>دسته جدید</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('categories.index')}}" class="nav-link">
                                    <i class="fa fa-list nav-icon"></i>
                                    <p>لیست دسته ها</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fa fa-folder"></i>
                            <p>
                                برند ها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('brands.create')}}" class="nav-link">
                                    <i class="fa fa-plus-circle nav-icon"></i>
                                    <p>برند جدید</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('brands.index')}}" class="nav-link">
                                    <i class="fa fa-list nav-icon"></i>
                                    <p>لیست برند ها</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fa fa-folder"></i>
                            <p>
                                محصول ها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('products.create')}}" class="nav-link">
                                    <i class="fa fa-plus-circle nav-icon"></i>
                                    <p>محصول جدید</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('products.index')}}" class="nav-link">
                                    <i class="fa fa-list nav-icon"></i>
                                    <p>لیست محصول ها</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fa fa-folder"></i>
                            <p>
                                رنگ ها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('colors.create')}}" class="nav-link">
                                    <i class="fa fa-plus-circle nav-icon"></i>
                                    <p>رنگ جدید</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('colors.index')}}" class="nav-link">
                                    <i class="fa fa-list nav-icon"></i>
                                    <p>لیست رنگ ها</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fa fa-folder"></i>
                            <p>
                                گروه ویژگی ها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('property_groups.create')}}" class="nav-link">
                                    <i class="fa fa-plus-circle nav-icon"></i>
                                    <p>گروه ویژگی های جدید</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('property_groups.index')}}" class="nav-link">
                                    <i class="fa fa-list nav-icon"></i>
                                    <p>لیست گروه ویژگی ها</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
