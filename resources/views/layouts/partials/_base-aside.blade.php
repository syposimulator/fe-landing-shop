<aside class="main-sidebar">
    <section class="sidebar">

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU</li>
            <li class="{{ Request::is(['dapur/product/*']) ? 'active' : '' }}">
                <a href="{{route('product.all')}}">
                    <i class="fa fa-link"></i> <span>Product</span>
                </a>
            </li>
            <li class="{{ Request::is(['dapur/blog/*']) ? 'active' : '' }}">
                <a href="{{route('blog.all')}}">
                    <i class="fa fa-link"></i> <span>Blog</span>
                </a>
            </li>
            <li class="{{ Request::is(['dapur/page/*']) ? 'active' : '' }}">
                <a href="{{route('page.all')}}">
                    <i class="fa fa-link"></i> <span>Page</span>
                </a>
            </li>
            <li class="{{ Request::is(['dapur/banner/*']) ? 'active' : '' }}">
                <a href="{{route('banner.all')}}">
                    <i class="fa fa-link"></i> <span>Banner</span>
                </a>
            </li>
            <li class="treeview {{ Request::is(['dapur/user/*','dapur/customer/*']) ? 'active menu-open' : '' }}">
                <a href="#">
                    <i class="fa fa-link"></i> <span>Users</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="">Customers</a>
                    </li>
                    <li class="{{ Request::is(['dapur/user/*']) ? 'active' : '' }}">
                        <a href="{{route('user.all')}}">Users</a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
</aside>