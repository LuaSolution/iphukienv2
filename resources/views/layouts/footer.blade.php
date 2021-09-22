<div class="ipk-container news-feed-container">
    <form action="{{ route('postContact') }}" method="POST">
        {{ csrf_field() }}
        <span>Đăng ký nhận khuyến mãi </span>
        <input type="text" name="email" placeholder="Email của bạn" class="news-feed-email" />
        <input type="submit" value="Đồng ý" class="submit-new-feed" />
    </form>
</div>
<div class="ipk-container footer-container">
    <div class="ipk-content-container">
        <div class="row footer">
            <div class="col l4 s12">
                <div class="name">Thông tin về iPhukien</div>
                <div class="company-infos">
                    <div class="company-info">Tên đơn vị: Hộ kinh doanh iPhukien</div>
                    <div class="company-info">GPĐKKD số 41P8021972 do Sở KHĐT TPHCM cấp 28/10/2020</div>
                    <div class="company-info">Chủ sở hữu: Nguyễn Đoàn Quốc Tuấn</div>
                    <div class="company-info">Địa chỉ: 270/2/1 Phan Đình Phùng, Phú Nhuận, Tp. Hồ Chí Minh</div>
                    <div class="company-info">Email: <a href="mailto:iphukien270@gmail.com"
                            style="color:#000">iphukien270@gmail.com</a></div>
                    <div class="company-info">Hotline: <a href="tel:0989102456" style="color:#000">0989102456</a></div>
                </div>
            </div>
            <div class="col l2 s12">
                <div class="name">iPhukien Shop</div>
                <div class="footer-link">
                    <a href="{{ url('gioi-thieu') }}">Giới thiệu</a>
                    <a href="{{ url('news') }}">Tin tức</a>
                    <a href="{{ url('tuyen-dung') }}">Tuyển dụng</a>
                    <!-- <a href="{{ url('gop-y') }}">Góp ý</a> -->
                </div>
            </div>
            <div class="col l4 s12">
                <div class="name">Hỗ trợ</div>
                <div class="footer-link">
                    <a href="{{ url('phuong-thuc-thanh-toan') }}">Phương thức thanh toán </a>
                    <a href="{{ url('chinh-sach-doi-tra') }}">Chính sách vận chuyển & đổi hàng</a>
                    <a href="{{ url('cach-thuc-thanh-toan') }}">Cách thức thanh toán</a>
                    <a href="{{ url('thong-tin-ngan-hang') }}">Thông tin tài khoản ngân hàng</a>
                    <a href="{{ url('chinh-sach-dieu-khoan-su-dung') }}">Chính sách điều khoản sử
                        dụng</a>
                    <a href="{{ url('chinh-sach-bao-mat') }}">Chính sách bảo mật</a>
                    <a href="{{ url('chinh-sach-hoan-huy') }}">Chính sách hoàn/hủy</a>
                </div>
            </div>
            <div class="col l2 s12">
                <div class="social-icons">
                    <a href="https://www.facebook.com/iPhukien/" class="ipk-footer-icon facebook-icon"></a>
                    <a href="http://instagram.com/iphukienshop" class="ipk-footer-icon instagram-icon"></a>
                    <a href="https://www.youtube.com/channel/UCXsSaOaLLCDP2pzKjV312wg"
                        class="ipk-footer-icon youtube-icon"></a>
                    <a href="https://vt.tiktok.com/ZSJU4Q1PE/" class="ipk-footer-icon tiktok-icon"></a>
                </div>
                <div class="bo-cong-thuong-icon">
                    <a href='http://online.gov.vn/Home/WebDetails/85480'>
                        <img style="height:100px"
                            src="{{ asset('public/assets/images/footer/cong-thuong.svg') }}" />
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        © {{ date('Y') }} Bản quyền thuộc về iPhukien. Một thiết kế và phát triển từ FlatCloud
    </div>
</div>

<div class="ipk-preloader hide">
    <div class="preloader-wrapper big active">
        <div class="spinner-layer spinner-blue-only">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div>
            <div class="gap-patch">
                <div class="circle"></div>
            </div>
            <div class="circle-clipper right">
                <div class="circle"></div>
            </div>
        </div>
    </div>
</div>