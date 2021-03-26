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
            <li class="nav-item @yield('page_layouts_active')">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-layers"></i>
                    <span class="title">Trang tĩnh</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <?php $menus = \App\StaticPage::get(); ?>
                    @foreach($menus as $menu)
                        <li class="nav-item">
                            <a href="{{ route('adMgetEditStaticPages', ['id' => $menu->id]) }}" class="nav-link ">
                                <span class="title"><i class="{{ $menu->icon}}"></i> {{ $menu->name}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>