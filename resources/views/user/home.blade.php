@extends('layouts.app')

@section('title', 'iPhuKien - Phụ kiện chính hãng')

@section('header')
@include('layouts.header', ['status' => 'complete'])
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('public/iphukien/user/home.css') }}">
<link rel="stylesheet" href="{{ asset('public/iphukien/user/list-product.css') }}">
<style>
.container{
    margin-top:30px;
text-align: center;
width: 100%;
height: 200px;
}
.btn-xem-them {
    height:51px;
    padding: 15px 40px;
    font-weight: normal;
    font-size: 20px;
    line-height: 23px;
    text-transform: uppercase;
    color: #000;
    border: 1px solid #000000;
    background-color: transparent;
    cursor: pointer;
}
</style>
@endsection

@section('content')
<script>
function countDown(key, date) {
    const countDownDate = new Date(date).getTime();

const x = setInterval(function() {
console.log(key)
  var now = new Date().getTime();

  var distance = countDownDate - now;

  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  document.getElementById("day" +key ).innerHTML = days
  document.getElementById("hour" + key ).innerHTML =hours
  document.getElementById("minute" + key ).innerHTML= minutes
  document.getElementById("second"+ key ).innerHTML =seconds
  if (distance < 0) {
    clearInterval(x);
  }
}, 1000);}
</script>
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
                <div class="ipk-pre-slide"></div>
                @foreach($flashSale as $key=>$item)
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
                                <span class="sale">{{ number_format($item->product->sale_price , 0, ',', '.') }}đ</span>
                                <span class="origin">{{ number_format($item->product->origin_price, 0, ',', '.') }}đ</span>
                            </div>
                            <div class="time">
                                <div id="day{{$key}}" class="day">03</div>
                                <div id="hour{{$key}}" class="hour">23</div>
                                <div id="minute{{$key}}" class="minute">59</div>
                                <div id="second{{$key}}" class="second">55</div>
                            </div>

                        </div>
                    </div>
                    <div class="button-detail">
                        <a href="{{ route('products.show', $item->product->product_id) }}">Xem chi tiết</a>
                    </div>
                </div>
            <?php
echo ('<script type="text/javascript">
                countDown(' . $key . ', "' . $item->product->to_date . '")
            </script>')
?>
                @endforeach
                <div class="ipk-next-slide"></div>
            </div>
        </div>
        @endif
        <div class="products-block">
            <p class="block-title">SẢN PHẨM MỚI</p>
            @include('layouts.list-product', ['listProduct' => $proNew, 'hasReadMore' => false])
            <div class="container">
                <a href="{{ url('/categories/none?sort=newest') }}" class="btn-xem-them" >XEM THÊM</a>
            </div>
        </div>
        <div class="products-block" style="margin-top:0">
            <p class="block-title">SẢN PHẨM BÁN CHẠY</p>
            @include('layouts.list-product', ['listProduct' => $proTopSold, 'hasReadMore' => false])
            <div class="container">
                <a href="{{ url('/categories/none?sort=mostbuy') }}" class="btn-xem-them" >XEM THÊM</a>
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
@include('layouts.quickview')
@endsection

@section('scripts')
<script src="{{ asset('public/assets/scripts/iphukien/user/list-product.js') }}"></script>
<script>
$(document).ready(function () {
    $.each($(".item-image"), function (index, value) {
        value.style.height = value.offsetWidth + "px";
    });
    $('.sale-product-slider').carousel({ fullWidth: true });
    $.each($(".partners img"), function (index, value) {
        let top = 55 - value.offsetWidth / 2;
        value.style.marginTop = top + "px";
    });
});
$(document).on("click", ".ipk-next-slide", function () {
    $('.sale-product-slider').carousel('next');
});
$(document).on("click", ".ipk-pre-slide", function () {
    $('.sale-product-slider').carousel('prev');
});
</script>
@endsection
