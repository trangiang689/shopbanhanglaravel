<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{\Illuminate\Support\Facades\URL::to('/dashboard')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Danh mục sản phẩm</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{route('admin.categories.index')}}">Liệt kê</a></li>
                        <li><a href="{{route('admin.categories.create')}}">Thêm</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Menu</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{route('admin.menus.index')}}">Liệt kê</a></li>
                        <li><a href="{{route('admin.menus.create')}}">Thêm</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Thương hiệu sản phẩm</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{route('admin.brands.index')}}">Liệt kê</a></li>
                        <li><a href="{{route('admin.brands.create')}}">Thêm</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Sản phẩm</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{route('admin.products.index')}}">Liệt kê</a></li>
                        <li><a href="{{route('admin.products.create')}}">Thêm</a></li>
                    </ul>
                </li>

            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
