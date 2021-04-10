<header class="ipk-container">
    <div class="ipk-left-header">
        <a href="#" data-target="slide-out" class="sidenav-trigger ipk-menu-icon"></a>
        <a href="https://www.facebook.com/" class="ipk-header-icon facebook-icon hide-on-small-only"></a>
        <a href="https://www.instagram.com/" class="ipk-header-icon instagram-icon hide-on-small-only"></a>
        <a href="https://www.youtube.com/" class="ipk-header-icon youtube-icon hide-on-small-only"></a>
    </div>
    <div class="ipk-right-header">
        <form class="header-search-form" method="get" action="{{ route('product.search') }}">
            <input type="text" name="keyword" class="txt-search-header"
                placeholder="Tìm sản phẩm, thương hiệu bạn mong muốn..." />
            <button type="submit" class="btn-search-header"></button>
        </form>
        @if(Auth::check())
            <div class="header-right-btn hide-on-small-only">
                <a href="" class="ipk-header-right-icon user-icon" data-target='user-dropdown'></a>
            </div>
        @else
            <div class="header-group-btn hide-on-small-only">
                <a href="{{ route('login') }}" class="ipk-btn btn-dang-nhap">Đăng nhập</a>
                <a href="{{ route('signup') }}" class="ipk-btn btn-dang-ky">Đăng ký ngay</a>
            </div>
        @endif
        <div class="header-right-btn hide-on-small-only">
            <a href="{{ route('user.wishlist') }}" class="ipk-header-right-icon wishlist-icon"></a>
        </div>
        <div class="header-right-btn hide-on-small-only">
            <a href="{{ route('user.cart') }}" class="ipk-header-right-icon cart-icon">
                <span></span>
            </a>
        </div>
    </div>
    <ul id="slide-out" class="sidenav ipk-slide-out">
        <li>
            <a href="#" class="sidenav-close"></a>
            <div class="ipk-logo-view">
            <a href="{{ route('getHome') }}" ><img src="{{ asset('public/assets/images/header/logo.svg') }}"></a>
            </div>
        </li>
        <li>
            <div class="ipk-tabs">
                <div class="ipk-tab active" data-id="list-san-pham">Sản phẩm</div>
                <div class="ipk-tab" data-id="list-chuyen-muc">Chuyên mục</div>
            </div>
            <div class="header-list">
                <div id="list-san-pham" class="menu-item">
                <?php $c = \App\Cate::get();?>
                            @foreach($c as $cate)
                    <div class="item-group">
                        <a href="{{ route('categories.show', ['id' => $cate->id]) }}" class="parent-item">{{ $cate->title }}</a>
                        <!-- <div class="list-sub-item">
                            <a href="#!" class="sub-item">Ốp lưng</a>
                            <a href="#!" class="sub-item">Ốp Lưng 1</a>
                            <a href="#!" class="sub-item">Ốp Lưng 2</a>
                            <a href="#!" class="sub-item">Ốp Lưng 3</a>
                        </div> -->
                    </div>
                    @endforeach
                </div>
                <div id="list-chuyen-muc" class="menu-item">
                    <a href="{{ url('gioi-thieu') }}" class="single-item">Giới thiệu</a>
                    <a href="{{ url('news') }}" class="single-item">Tin tức</a>
                    <a href="{{ url('tuyen-dung') }}" class="single-item">Tuyển dụng</a>
                    <a href="{{ url('gop-y') }}" class="single-item">Liên hệ</a>
                </div>
            </div>
        </li>
    </ul>
    @if(Auth::check())
        <ul id='user-dropdown' class='dropdown-content'>
            <li class="first-line">
                <div class="avatar"
                    style="background-image: url({{ isset(Auth::user()->avatar) ? asset('public/img/avatar/' . Auth::user()->avatar) : asset('public/assets/images/header/logo.svg') }})">
                </div>
                <span><a href="{{ route('user.information') }}">{{ Auth::user()->name }}</a></span>
            </li>
            <li><a href="{{ route('user.orders') }}">Đơn hàng của tôi</a></li>
            <li><a href="#!">Cài đặt tài khoản</a></li>
            <li><a href="{{ route('doLogout') }}">Đăng xuất</a></li>
        </ul>
    @endif
</header>