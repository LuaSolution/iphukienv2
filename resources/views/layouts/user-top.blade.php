@if (Auth::check())
<div class="notify-text">Miễn phí giao hàng cho đơn hàng tối thiểu 1 tỉ đồng</div>
<div class="user-infos">
    <a href="javascript:void(0)" class="user-top-dropdown dropdown-trigger" data-target='user-top-dropdown'></a>
    <div class="avatar" style="background-image: url({{ isset(Auth::user()->avatar) ? asset('public/' . Auth::user()->avatar) : asset('public/assets/images/header/logo.svg') }})"></div>
    <div class="info">
        <div class="name">{{Auth::user()->name}}</div>
        <div class="email">{{Auth::user()->email}}</div>
    </div>
    <a class="logout-link" href="{{ route('doLogout') }}">
        Đăng xuất
    </a>
</div>
<ul id='user-top-dropdown' class='dropdown-content'>
    <li><a href="{{ route('user.information') }}">THÔNG TIN TÀI KHOẢN</a></li>
    <li><a href="{{ route('user.addresses') }}">ĐỊA CHỈ NHẬN HÀNG</a></li>
    <li><a href="{{ route('user.change-password') }}">ĐỔI MẬT KHẨU</a></li>
    <li><a href="{{ route('user.orders') }}">LỊCH SỬ MUA HÀNG</a></li>
    <li><a href="{{ route('user.wishlist') }}">DANH SÁCH YÊU THÍCH</a></li>
</ul>
@endif
