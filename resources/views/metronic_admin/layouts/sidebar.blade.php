<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item @yield('home_active')">
                <a href="{{ route('adMgetHome') }}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="heading">
                <h3 class="uppercase">Quản trị</h3>
            </li>
            <li class="nav-item start @yield('add_page_active') @yield('list_page_active')">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Trang tĩnh</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item @yield('add_page_active')">
                        <a href="{{ route('adMgetAddStaticPage') }}" class="nav-link">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Thêm page mới</span>
                        </a>
                    </li>
                    <li class="nav-item @yield('list_page_active')">
                        <a href="{{ route('adMgetListStaticPage') }}" class="nav-link">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Danh sách page</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item start @yield('list_news_active') @yield('add_news_active')">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Bài viết</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item @yield('add_news_active')">
                        <a href="{{ route('adMgetAddNews') }}" class="nav-link">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Thêm bài viết mới</span>
                        </a>
                    </li>
                    <li class="nav-item @yield('list_news_active')">
                        <a href="{{ route('adMgetListNews') }}" class="nav-link">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Danh sách bài viết</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item start @yield('list_users_active') @yield('add_users_active')">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Người dùng</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item @yield('add_users_active')">
                        <a href="{{ route('adMgetAddUser') }}" class="nav-link">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Thêm người dùng</span>
                        </a>
                    </li>
                    <li class="nav-item @yield('list_users_active')">
                        <a href="{{ route('adMgetListUser') }}" class="nav-link">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Danh sách người dùng</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item start @yield('list_categories_active') @yield('add_categories_active')">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Danh mục</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item @yield('add_categories_active')">
                        <a href="{{ route('adMgetAddCategory') }}" class="nav-link">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Thêm danh mục</span>
                        </a>
                    </li>
                    <li class="nav-item @yield('list_categories_active')">
                        <a href="{{ route('adMgetListCategory') }}" class="nav-link">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Danh sách danh mục</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item start @yield('list_colors_active') @yield('add_colors_active')">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Màu sắc</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item @yield('add_colors_active')">
                        <a href="{{ route('adMgetAddColor') }}" class="nav-link">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Thêm màu sắc</span>
                        </a>
                    </li>
                    <li class="nav-item @yield('list_colors_active')">
                        <a href="{{ route('adMgetListColor') }}" class="nav-link">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Danh sách màu sắc</span>
                        </a>
                    </li>

                </ul>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>