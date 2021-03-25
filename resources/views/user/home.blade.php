@extends('layouts.app')

@section('title', 'iPhuKien - Phụ kiện chính hãng')

@section('header')
@include('layouts.header', ['status' => 'complete'])
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('public/iphukien/user/header.css') }}">
<link rel="stylesheet" href="{{ asset('public/iphukien/user/home.css') }}">
<link rel="stylesheet" href="{{ asset('public/iphukien/user/list-product.css') }}">
<link rel="stylesheet" href="{{ asset('public/iphukien/user/footer.css') }}">
@endsection

@section('content')
<div class="ipk-container">
    <div class="ipk-content-container">
        <div class="remove-line-height banner">
            <img src="{{ asset('public/assets/images/demo/slider.png') }}" />
        </div>
        <div class="list-category">
            <div class="row">
                <div class="col m5ths m4 cat-item remove-line-height">
                    <a href="#!">
                        <div class="img-wrapper"
                            style="background-image: url({{ asset('public/assets/images/demo/op_lung.png') }})"></div>
                        <p>Ốp lưng</p>
                    </a>
                </div>
                <div class="col m5ths m4 cat-item remove-line-height">
                    <div class="img-wrapper"
                        style="background-image: url({{ asset('public/assets/images/demo/kinh_cuong_luc.png') }})"></div>
                    <p>Kính cường lực</p>
                </div>
                <div class="col m5ths m4 cat-item remove-line-height">
                    <div class="img-wrapper"
                        style="background-image: url({{ asset('public/assets/images/demo/op_lung_watch.png') }})"></div>
                    <p>Ốp lưng watch</p>
                </div>
                <div class="col m5ths m4 cat-item remove-line-height">
                    <div class="img-wrapper"
                        style="background-image: url({{ asset('public/assets/images/demo/day_da_watch.png') }})"></div>
                    <p>Dây da watch</p>
                </div>
                <div class="col m5ths m4 cat-item remove-line-height">
                    <div class="img-wrapper"
                        style="background-image: url({{ asset('public/assets/images/demo/phu_kien_watch.png') }})"></div>
                    <p>Phụ kiện watch</p>
                </div>
            </div>
        </div>
        <div class="sale-products">
            <div class="carousel carousel-slider sale-product-slider">
                <div class="carousel-item">
                    <div class="flash-deal-icon">Flash deal</div>
                    <div class="carousel-item-wrapper">
                        <div class="item-image remove-line-height"
                            style="background-image: url({{ asset('public/assets/images/demo/headphone.png') }})">
                        </div>
                        <div class="item-infos">
                            <div class="name">Tên Sản phẩm 1 dòng</div>
                            <div class="description">Món quà tuyệt vời dành cho người sành cà phê. Hạt cà phê được Revo
                                cẩn
                                trọng chọn lựa, rang xay theo công nghệ và bí quyết học hỏi từ những nghệ nhân nổi
                                tiếng,
                                cùng
                                với tình yêu, sự đam mê của người làm cà phê… tạo ra những tách cà phê tinh khiết chỉ
                                dành
                                riêng
                                cho bạn. tối đa 4 dòng</div>
                            <div class="price">
                                <span class="sale">18.200.000 đ</span>
                                <span class="origin">23.200.000 đ</span>
                            </div>
                            <div class="time">
                                <div class="day">03</div>
                                <div class="hour">23</div>
                                <div class="minute">59</div>
                                <div class="second">55</div>
                            </div>

                        </div>
                    </div>
                    <div class="button-detail">
                        <a href="#!">Xem chi tiết</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="flash-deal-icon">Flash deal</div>
                    <div class="carousel-item-wrapper">
                        <div class="item-image remove-line-height"
                            style="background-image: url({{ asset('public/assets/images/demo/headphone.png') }})">
                        </div>
                        <div class="item-infos">
                            <div class="name">Tên Sản phẩm 5 dòng</div>
                            <div class="description">Món quà tuyệt vời dành cho người sành cà phê. Hạt cà phê được Revo
                                cẩn
                                trọng chọn lựa, rang xay theo công nghệ và bí quyết học hỏi từ những nghệ nhân nổi
                                tiếng,
                                cùng
                                với tình yêu, sự đam mê của người làm cà phê… tạo ra những tách cà phê tinh khiết chỉ
                                dành
                                riêng
                                cho bạn. tối đa 4 dòng</div>
                            <div class="price">
                                <span class="sale">18.200.000 đ</span>
                                <span class="origin">23.200.000 đ</span>
                            </div>
                            <div class="time">
                                <div class="day">03</div>
                                <div class="hour">23</div>
                                <div class="minute">59</div>
                                <div class="second">55</div>
                            </div>

                        </div>
                    </div>
                    <div class="button-detail">
                        <a href="#!">Xem chi tiết</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="flash-deal-icon">Flash deal</div>
                    <div class="carousel-item-wrapper">
                        <div class="item-image remove-line-height"
                            style="background-image: url({{ asset('public/assets/images/demo/headphone.png') }})">
                        </div>
                        <div class="item-infos">
                            <div class="name">Tên Sản phẩm 2 dòng</div>
                            <div class="description">Món quà tuyệt vời dành cho người sành cà phê. Hạt cà phê được Revo
                                cẩn
                                trọng chọn lựa, rang xay theo công nghệ và bí quyết học hỏi từ những nghệ nhân nổi
                                tiếng,
                                cùng
                                với tình yêu, sự đam mê của người làm cà phê… tạo ra những tách cà phê tinh khiết chỉ
                                dành
                                riêng
                                cho bạn. tối đa 4 dòng</div>
                            <div class="price">
                                <span class="sale">18.200.000 đ</span>
                                <span class="origin">23.200.000 đ</span>
                            </div>
                            <div class="time">
                                <div class="day">03</div>
                                <div class="hour">23</div>
                                <div class="minute">59</div>
                                <div class="second">55</div>
                            </div>

                        </div>
                    </div>
                    <div class="button-detail">
                        <a href="#!">Xem chi tiết</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="flash-deal-icon">Flash deal</div>
                    <div class="carousel-item-wrapper">
                        <div class="item-image remove-line-height"
                            style="background-image: url({{ asset('public/assets/images/demo/headphone.png') }})">
                        </div>
                        <div class="item-infos">
                            <div class="name">Tên Sản phẩm 3 dòng</div>
                            <div class="description">Món quà tuyệt vời dành cho người sành cà phê. Hạt cà phê được Revo
                                cẩn
                                trọng chọn lựa, rang xay theo công nghệ và bí quyết học hỏi từ những nghệ nhân nổi
                                tiếng,
                                cùng
                                với tình yêu, sự đam mê của người làm cà phê… tạo ra những tách cà phê tinh khiết chỉ
                                dành
                                riêng
                                cho bạn. tối đa 4 dòng</div>
                            <div class="price">
                                <span class="sale">18.200.000 đ</span>
                                <span class="origin">23.200.000 đ</span>
                            </div>
                            <div class="time">
                                <div class="day">03</div>
                                <div class="hour">23</div>
                                <div class="minute">59</div>
                                <div class="second">55</div>
                            </div>

                        </div>
                    </div>
                    <div class="button-detail">
                        <a href="#!">Xem chi tiết</a>
                    </div>
                </div>
                <div class="ipk-next-slide"></div>
            </div>
        </div>
        <div class="products-block">
            <p class="block-title">Sản phẩm mới</p>
            @include('layouts.list-product', ['fromPage' => 'home'])
        </div>
        <div class="products-block">
            <p class="block-title">Sản phẩm bán chạy</p>
            @include('layouts.list-product', ['fromPage' => 'home'])
        </div>
    </div>
</div>
<div class="ipk-container partners-container">
    <div class="partners">
        <img src="{{ asset('public/assets/images/header/logo.svg') }}" />
        <img src="{{ asset('public/assets/images/header/logo.svg') }}" />
        <img src="{{ asset('public/assets/images/header/logo.svg') }}" />
        <img src="{{ asset('public/assets/images/header/logo.svg') }}" />
        <img src="{{ asset('public/assets/images/header/logo.svg') }}" />
        <img src="{{ asset('public/assets/images/header/logo.svg') }}" />
        <img src="{{ asset('public/assets/images/header/logo.svg') }}" />
        <img src="{{ asset('public/assets/images/header/logo.svg') }}" />
        <img src="{{ asset('public/assets/images/header/logo.svg') }}" />
        <img src="{{ asset('public/assets/images/header/logo.svg') }}" />
        <img src="{{ asset('public/assets/images/header/logo.svg') }}" />
    </div>
</div>
<div class="ipk-container news-feed-container">
    <form method="post">
        <span>Đăng ký nhận khuyến mãi </span>
        <input type="text" name="email" placeholder="Email của bạn" class="news-feed-email" />
        <input type="submit" value="Đồng ý" class="submit-new-feed" />
    </form>
</div>
@endsection

@section('footer')
@include('layouts.footer', ['status' => 'complete'])
@endsection

@section('scripts')
<script src="{{ asset('public/assets/scripts/iphukien/user/header.js') }}"></script>
<script src="{{ asset('public/assets/scripts/iphukien/user/home.js') }}"></script>
<script src="{{ asset('public/assets/scripts/iphukien/user/list-product.js') }}"></script>
@endsection