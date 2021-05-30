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
            <li class="nav-item start @yield('list_sizes_active') @yield('add_sizes_active')">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Kích thước</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item @yield('add_sizes_active')">
                        <a href="{{ route('adMgetAddSize') }}" class="nav-link">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Thêm kích thước</span>
                        </a>
                    </li>
                    <li class="nav-item @yield('list_sizes_active')">
                        <a href="{{ route('adMgetListSize') }}" class="nav-link">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Danh sách kích thước</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item start @yield('list_roles_active') @yield('add_roles_active')">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Vai trò</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item @yield('add_roles_active')">
                        <a href="{{ route('adMgetAddRole') }}" class="nav-link">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Thêm vai trò</span>
                        </a>
                    </li>
                    <li class="nav-item @yield('list_roles_active')">
                        <a href="{{ route('adMgetListRole') }}" class="nav-link">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Danh sách vai trò</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item start @yield('list_statuses_active') @yield('add_statuses_active')">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Trạng thái</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item @yield('add_statuses_active')">
                        <a href="{{ route('adMgetAddStatus') }}" class="nav-link">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Thêm trạng thái</span>
                        </a>
                    </li>
                    <li class="nav-item @yield('list_statuses_active')">
                        <a href="{{ route('adMgetListStatus') }}" class="nav-link">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Danh sách trạng thái</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item start @yield('list_tags_active') @yield('add_tags_active')">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Tag</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item @yield('add_tags_active')">
                        <a href="{{ route('adMgetAddTag') }}" class="nav-link">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Thêm tag</span>
                        </a>
                    </li>
                    <li class="nav-item @yield('list_tags_active')">
                        <a href="{{ route('adMgetListTag') }}" class="nav-link">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Danh sách tag</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item start @yield('list_payment_methods_active') @yield('add_payment_methods_active')">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Phương thức thanh toán</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item @yield('add_payment_methods_active')">
                        <a href="{{ route('adMgetAddPaymentMethod') }}" class="nav-link">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Thêm phương thức thanh toán</span>
                        </a>
                    </li>
                    <li class="nav-item @yield('list_payment_methods_active')">
                        <a href="{{ route('adMgetListPaymentMethod') }}" class="nav-link">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Danh sách phương thức thanh toán</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item start @yield('list_deliveries_active') @yield('add_deliveries_active')">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Hình thức vận chuyển</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item @yield('add_deliveries_active')">
                        <a href="{{ route('adMgetAddDelivery') }}" class="nav-link">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Thêm hình thức vận chuyển</span>
                        </a>
                    </li>
                    <li class="nav-item @yield('list_payment_methods_active')">
                        <a href="{{ route('adMgetListDelivery') }}" class="nav-link">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Danh sách hình thức vận chuyển</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item start @yield('list_products_active') @yield('add_products_active')">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Sản phẩm</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item @yield('add_products_active')">
                        <a href="{{ route('adMgetAddProduct') }}" class="nav-link">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Thêm sản phẩm</span>
                        </a>
                    </li>
                    <li class="nav-item @yield('list_products_active')">
                        <a href="{{ route('adMgetListProduct') }}" class="nav-link">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Danh sách sản phẩm</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item start @yield('list_orders_active')">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Quản lý đơn hàng</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item @yield('list_orders_active')">
                        <a href="{{ route('adMgetListOrders') }}" class="nav-link">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Danh sách đơn hàng</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item start @yield('list_sale_products_active') @yield('add_sale_products_active')">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Flash sale</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item @yield('add_sale_products_active')">
                        <a href="{{ route('adMgetAddSaleProduct') }}" class="nav-link">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Thêm flash sale</span>
                        </a>
                    </li>
                    <li class="nav-item @yield('list_sale_products_active')">
                        <a href="{{ route('adMgetListSaleProduct') }}" class="nav-link">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Danh sách flash sale</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item start @yield('list_trademarks_active') @yield('add_trademarks_active')">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Thương hiệu</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item @yield('add_trademarks_active')">
                        <a href="{{ route('adMgetAddTrademark') }}" class="nav-link">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Thêm thương hiệu</span>
                        </a>
                    </li>
                    <li class="nav-item @yield('list_trademarks_active')">
                        <a href="{{ route('adMgetListTrademark') }}" class="nav-link">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Danh sách thương hiệu</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item start @yield('list_slider_active') @yield('add_slider_active')">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Slider</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <!-- <li class="nav-item @yield('add_slider_active')">
                        <a href="{{ route('sliders.create') }}" class="nav-link">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Thêm Slider</span>
                        </a>
                    </li> -->
                    <li class="nav-item @yield('list_slider_active')">
                        <a href="{{ route('sliders.index') }}" class="nav-link">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Danh sách Slider</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">quảng cáo</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="{{  route('adMgetListPromotion') }}" class="nav-link">
                            <i class="icon-bar-chart"></i>
                            <span class="title">quảng cáo</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item start @yield('list_meta_active')">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Cấu hình thẻ meta</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <!-- <li class="nav-item @yield('add_slider_active')">
                        <a href="{{ route('sliders.create') }}" class="nav-link">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Thêm Slider</span>
                        </a>
                    </li> -->
                    <li class="nav-item @yield('list_meta_active')">
                        <a href="{{ route('adMgetListMeta') }}" class="nav-link">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Cấu hình thẻ meta</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item start @yield('list_partner_active') @yield('add_partner_active')">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Đối tác</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item @yield('add_partner_active')">
                        <a href="{{ route('partners.create') }}" class="nav-link">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Thêm đối tác</span>
                        </a>
                    </li>
                    <li class="nav-item @yield('list_partner_active')">
                        <a href="{{ route('partners.index') }}" class="nav-link">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Danh sách đối tác</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
