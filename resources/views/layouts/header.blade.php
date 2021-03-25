<header class="ipk-container">
    <div class="ipk-left-header">
        <a href="#" data-target="slide-out" class="sidenav-trigger ipk-menu-icon"></a>
        <a href="https://www.facebook.com/" class="ipk-header-icon facebook-icon"></a>
        <a href="https://www.instagram.com/" class="ipk-header-icon instagram-icon"></a>
        <a href="https://www.youtube.com/" class="ipk-header-icon youtube-icon"></a>
    </div>
    <div class="ipk-right-header">
        <form class="header-search-form">
            <input type="text" name="keyword" class="txt-search-header"
                placeholder="Tìm sản phẩm, thương hiệu bạn mong muốn..." />
            <button type="submit" class="btn-search-header"></button>
        </form>
        <div class="header-group-btn">
            <a href="{{ route('login') }}" class="ipk-btn btn-dang-nhap">Đăng nhập</a>
            <a href="{{ route('signup') }}" class="ipk-btn btn-dang-ky">Đăng ký ngay</a>
        </div>
        <!-- <div class="header-right-btn">
            <a href="" class="ipk-header-right-icon user-icon" data-target='user-dropdown'></a>
        </div> -->
        <div class="header-right-btn">
            <a href="" class="ipk-header-right-icon wishlist-icon"></a>
        </div>
        <div class="header-right-btn">
            <a href="" class="ipk-header-right-icon cart-icon">
                <span>10</span>
            </a>
        </div>
    </div>
    <ul id="slide-out" class="sidenav ipk-slide-out">
        <li>
            <a href="#!" class="sidenav-close"></a>
            <div class="ipk-logo-view">
                <img src="{{ asset('public/assets/images/header/logo.svg') }}">
            </div>
        </li>
        <li>
            <div class="ipk-tabs">
                <div class="ipk-tab active" data-id="list-san-pham">Sản phẩm</div>
                <div class="ipk-tab" data-id="list-chuyen-muc">Chuyên mục</div>
            </div>
            <div class="header-list">
                <div id="list-san-pham" class="menu-item">
                    <div class="item-group">
                        <a href="#!" class="parent-item">Phụ kiện điện thoại</a>
                        <div class="list-sub-item">
                            <a href="#!" class="sub-item">Ốp lưng</a>
                            <a href="#!" class="sub-item">Ốp Lưng 1</a>
                            <a href="#!" class="sub-item">Ốp Lưng 2</a>
                            <a href="#!" class="sub-item">Ốp Lưng 3</a>
                        </div>
                    </div>
                    <div class="item-group">
                        <a href="#!" class="parent-item">Phụ kiện điện thoại</a>
                        <div class="list-sub-item">
                            <a href="#!" class="sub-item">Ốp lưng</a>
                            <a href="#!" class="sub-item">Ốp Lưng 1</a>
                            <a href="#!" class="sub-item">Ốp Lưng 2</a>
                            <a href="#!" class="sub-item">Ốp Lưng 3</a>
                        </div>
                    </div>
                    <div class="item-group">
                        <a href="#!" class="parent-item">Phụ kiện điện thoại</a>
                        <div class="list-sub-item">
                            <a href="#!" class="sub-item">Ốp lưng</a>
                            <a href="#!" class="sub-item">Ốp Lưng 1</a>
                            <a href="#!" class="sub-item">Ốp Lưng 2</a>
                            <a href="#!" class="sub-item">Ốp Lưng 3</a>
                        </div>
                    </div>
                    <div class="item-group">
                        <a href="#!" class="parent-item">Phụ kiện điện thoại</a>
                        <div class="list-sub-item">
                            <a href="#!" class="sub-item">Ốp lưng</a>
                            <a href="#!" class="sub-item">Ốp Lưng 1</a>
                            <a href="#!" class="sub-item">Ốp Lưng 2</a>
                            <a href="#!" class="sub-item">Ốp Lưng 3</a>
                        </div>
                    </div>
                </div>
                <div id="list-chuyen-muc" class="menu-item">
                    <a href="#!" class="single-item">Giới thiệu</a>
                    <a href="#!" class="single-item">Tin tức</a>
                    <a href="#!" class="single-item">Tuyển dụng</a>
                    <a href="#!" class="single-item">Liên hệ</a>
                </div>
            </div>
        </li>
    </ul>
    <ul id='user-dropdown' class='dropdown-content'>
        <li class="first-line">
            <div class="avatar" style="background-image: url({{ asset('public/assets/images/demo/avatar.jpg') }})"></div>
            <span>Lê Nguyễn Kiều Trâm</span>
        </li>
        <li><a href="#!">Đơn hàng của tôi</a></li>
        <li><a href="#!">Cài đặt tài khoản</a></li>
        <li><a href="#!">Đăng xuất</a></li>
    </ul>

</header>