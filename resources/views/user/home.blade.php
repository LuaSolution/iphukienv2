@extends('layouts.app')

@section('title', 'iPhuKien - Phụ kiện chính hãng')

@section('header')
@include('layouts.header', ['status' => 'complete'])
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('public/iphukien/user/home.css') }}">
<link rel="stylesheet" href="{{ asset('public/iphukien/user/list-product.css') }}">
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
                            style="background-image: url({{ asset('/public/' . $item->image) }})"></div>
                        <p>{{ $item->title }}</p>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        @if(count($flashSale) > 0)
        <div class="sale-products">
            <div class="carousel carousel-slider sale-product-slider">
                @foreach($flashSale as $item)
                <div class="carousel-item">
                    <div class="flash-deal-icon">Flash deal</div>
                    <div class="carousel-item-wrapper">
                        <div class="item-image remove-line-height"
                            style="background-image: url({{ $item->img }})">
                        </div>
                        <div class="item-infos">
                            <div class="name">{{ $item->product->product_name }}</div>
                            <div class="description">{{ $item->product->product_des }}</div>
                            <div class="price">
                                <span class="sale">{{ $item->product->sale_price }} đ</span>
                                <span class="origin">{{ $item->product->origin_price }} đ</span>
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
                        <a href="{{ route('products.show', $item->product->product_id) }}">Xem chi tiết</a>
                    </div>
                </div>
                @endforeach
                <div class="ipk-next-slide"></div>
            </div>
        </div>
        @endif
        <div class="products-block">
            <p class="block-title">Sản phẩm mới</p>
            @include('layouts.list-product', ['listProduct' => $proNew, 'hasReadMore' => false])
        </div>
        <div class="products-block">
            <p class="block-title">Sản phẩm bán chạy</p>
            @include('layouts.list-product', ['listProduct' => $proTopSold, 'hasReadMore' => false])
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
<script src="{{ asset('public/assets/scripts/iphukien/user/home.js') }}"></script>
<script src="{{ asset('public/assets/scripts/iphukien/user/list-product.js') }}"></script>
@endsection
