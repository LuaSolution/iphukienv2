<div class="main-menu">
        <h5 class="sidenav-heading">Main</h5>
        <ul id="side-main-menu" class="side-menu list-unstyled">
                <li class="@yield('home_active')">
                        <a href="{{ route('adgetHome') }}">
                                <i class="icon-home"></i>
                                Dashboard
                        </a>
                </li>
                <li class="@yield('add_news_active')">
                        <a href="{{ route('adgetAddNews') }}">
                                <i class="icon-form"></i>
                                Thêm bài viết mới
                        </a>
                </li>
                <li class="@yield('list_news_active')">
                        <a href="{{ route('adgetListNews') }}">
                                <i class="icon icon-list"></i>
                                Danh sách bài viết</a>
                </li>
                <li class="@yield('list_contact_active')">
                        <a href="{{ route('adgetListContact') }}">
                                <i class="icon icon-list"></i>
                                Danh sách liên hệ</a>
                </li>
                <li class="@yield('list_order_active')">
                        <a href="{{ route('adgetListOrder') }}">
                                <i class="icon icon-list"></i>
                                Danh sách đơn hàng</a>
                </li>
                <li class="@yield('list_user_active')">
                        <a href="{{ route('adgetListUser') }}">
                                <i class="icon icon-user"></i>
                                Danh sách người dùng
                        </a>
                </li>
        </ul>
</div>