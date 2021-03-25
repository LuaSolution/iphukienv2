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
            @foreach($cates as $item)
                <div class="col m5ths m4 cat-item remove-line-height">
                    <a href="{{ route('categories.show', ['id' => $item->id]) }}">
                        <div class="img-wrapper"
                            style="background-image: url({{asset('/public/cates/' .$item->id. '.png')}})"></div>
                        <p>{{$item->title}}</p>
                    </a>
                </div>
@endforeach
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
            <div class="products-wrapper">
    <div class="row products">
@foreach($proNew as $item)
        <div class="product col l3 added-wishlist">
            <div class="img" style="background-image: url({{ asset('public/assets/images/demo/ipod.png') }})"></div>
            <div class="name">
                <a href="{{ route('products.show', 1) }}">
                    {{$item->name}}
                </a>
            </div>
            <div class="price">
                <span class="sale">  {{$item->price}}đ</span>
                <span class="origin">  {{$item->sale_price}}đ</span>
            </div>
            <div class="button-wrapper">
                <a class="modal-trigger" href="#quickview">Xem nhanh</a>
            </div>
        </div>
@endforeach
    </div>
    <a href="#!" class="view-more">Xem thêm</a>
</div>
<!-- Modal Structure -->
<div id="quickview" class="modal">
    <div class="modal-content">
        <a href="#!" class="modal-close close-quickview"><a>
        <div class="carousel carousel-slider quickview-slider">
            <a href="#!" class="previous"></a>
            <div class="carousel-item product-img added-wishlist">
                <span class="sale-percent">-50%</span>
                <img src="{{ asset('public/assets/images/demo/watch.png') }}" />
            </div>
            <div class="carousel-item product-img">
                <img src="{{ asset('public/assets/images/demo/watch.png') }}" />
            </div>
            <div class="carousel-item product-img">
                <img src="{{ asset('public/assets/images/demo/watch.png') }}" />
            </div>
            <div class="carousel-item product-img">
                <img src="{{ asset('public/assets/images/demo/watch.png') }}" />
            </div>
            <a href="#!" class="next"></a>
        </div>
        <div class="product-infos">
            <div class="name">Tên của sản phẩm này là</div>
            <div class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mi dignissim
                euismod
                lectus fermentum mollis lorem nec aliquam urna. Id fames vestibulum quis nam pharetra, id magna
                nibh
                cras. At fames id arcu elit tristique commodo eu, integer eget. Varius purus, tortor euismod
                dolor in.
                Sagittis, vulputate consectetur pellentesque quis facilisis accumsan</div>
            <div class="list-tags">
                <span class="tag hang-moi"></span>
                <span class="tag ban-chay"></span>
                <span class="tag giam-gia"></span>
            </div>
            <div class="price">
                <div class="origin">36.400.000đ</div>
                <div class="sale">18.200.000đ <span>Giảm 50%</span></div>
            </div>
            <div class="status-wrapper">
                <div class="status-label">Tình trạng</div>
                <div class="list-status">
                    <span class="status het-hang"></span>
                    <span class="status dat-truoc"></span>
                    <span class="status con-hang"></span>
                </div>
            </div>
            <div class="colors-wrapper">
                <div class="color-label">Màu sắc</div>
                <div class="colors">
                    <span class="color">Xanh lá</span>
                    <span class="color">Xanh da trời</span>
                    <span class="color">Tím</span>
                </div>
            </div>
            <div class="sizes-wrapper">
                <div class="size-label">Kích thước<a href="#!" target="_blank">(Hướng dẫn chọn size)</a></div>
                <div class="sizes">
                    <span class="size">XS</span>
                    <span class="size">S</span>
                    <span class="size">M</span>
                    <span class="size">L</span>
                    <span class="size">XL</span>
                </div>
            </div>
            <div class="pre-order-block">
                <div class="quantity-input">
                    <span class="decrease">-</span>
                    <input type="number" class="quantity" value="0" />
                    <span class="increase">+</span>
                </div>
                <a href="#!" class="add-to-card-btn">Thêm vào giỏ hàng</a>
                <a href="{{ route('user.cart') }}" class="buy-now-btn">Mua ngay</a>
            </div>
        </div>
    </div>
</div>
        </div>
        <div class="products-block">
            <p class="block-title">Sản phẩm bán chạy</p>
            <div class="products-wrapper">
    <div class="row products">
    @foreach($proTopSold as $item)
        <div class="product col l3 added-wishlist">
            <div class="img" style="background-image: url({{ asset('public/assets/images/demo/ipod.png') }})"></div>
            <div class="name">
                <a href="{{ route('products.show', 1) }}">
                    {{$item->name}}
                </a>
            </div>
            <div class="price">
                <span class="sale">  {{$item->price}}đ</span>
                <span class="origin">  {{$item->sale_price}}đ</span>
            </div>
            <div class="button-wrapper">
                <a class="modal-trigger" href="#quickview">Xem nhanh</a>
            </div>
        </div>
@endforeach
    </div>
    <a href="#!" class="view-more">Xem thêm</a>
</div>
<!-- Modal Structure -->
<div id="quickview" class="modal">
    <div class="modal-content">
        <a href="#!" class="modal-close close-quickview"><a>
        <div class="carousel carousel-slider quickview-slider">
            <a href="#!" class="previous"></a>
            <div class="carousel-item product-img added-wishlist">
                <span class="sale-percent">-50%</span>
                <img src="{{ asset('public/assets/images/demo/watch.png') }}" />
            </div>
            <div class="carousel-item product-img">
                <img src="{{ asset('public/assets/images/demo/watch.png') }}" />
            </div>
            <div class="carousel-item product-img">
                <img src="{{ asset('public/assets/images/demo/watch.png') }}" />
            </div>
            <div class="carousel-item product-img">
                <img src="{{ asset('public/assets/images/demo/watch.png') }}" />
            </div>
            <a href="#!" class="next"></a>
        </div>
        <div class="product-infos">
            <div class="name">Tên của sản phẩm này là</div>
            <div class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mi dignissim
                euismod
                lectus fermentum mollis lorem nec aliquam urna. Id fames vestibulum quis nam pharetra, id magna
                nibh
                cras. At fames id arcu elit tristique commodo eu, integer eget. Varius purus, tortor euismod
                dolor in.
                Sagittis, vulputate consectetur pellentesque quis facilisis accumsan</div>
            <div class="list-tags">
                <span class="tag hang-moi"></span>
                <span class="tag ban-chay"></span>
                <span class="tag giam-gia"></span>
            </div>
            <div class="price">
                <div class="origin">36.400.000đ</div>
                <div class="sale">18.200.000đ <span>Giảm 50%</span></div>
            </div>
            <div class="status-wrapper">
                <div class="status-label">Tình trạng</div>
                <div class="list-status">
                    <span class="status het-hang"></span>
                    <span class="status dat-truoc"></span>
                    <span class="status con-hang"></span>
                </div>
            </div>
            <div class="colors-wrapper">
                <div class="color-label">Màu sắc</div>
                <div class="colors">
                    <span class="color">Xanh lá</span>
                    <span class="color">Xanh da trời</span>
                    <span class="color">Tím</span>
                </div>
            </div>
            <div class="sizes-wrapper">
                <div class="size-label">Kích thước<a href="#!" target="_blank">(Hướng dẫn chọn size)</a></div>
                <div class="sizes">
                    <span class="size">XS</span>
                    <span class="size">S</span>
                    <span class="size">M</span>
                    <span class="size">L</span>
                    <span class="size">XL</span>
                </div>
            </div>
            <div class="pre-order-block">
                <div class="quantity-input">
                    <span class="decrease">-</span>
                    <input type="number" class="quantity" value="0" />
                    <span class="increase">+</span>
                </div>
                <a href="#!" class="add-to-card-btn">Thêm vào giỏ hàng</a>
                <a href="{{ route('user.cart') }}" class="buy-now-btn">Mua ngay</a>
            </div>
        </div>
    </div>
</div>
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
<form action="{{ route('postContact') }}" method="POST">
                {{ csrf_field() }}
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