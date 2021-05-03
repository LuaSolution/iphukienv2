@extends('layouts.app')

@section('title', 'Phụ kiện chính hãng')

@section('header')
@include('layouts.header', ['status' => 'complete'])
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('public/iphukien/user/home.css') }}">
<link rel="stylesheet" href="{{ asset('public/iphukien/user/list-product.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
<link rel="stylesheet" href="{{ asset('public/iphukien/user/common.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
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
// console.log(key)
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

  document.getElementById("day" +key+"-mobile").innerHTML = days
  document.getElementById("hour" + key+"-mobile" ).innerHTML =hours
  document.getElementById("minute" + key+"-mobile" ).innerHTML= minutes
  document.getElementById("second"+ key+"-mobile" ).innerHTML =seconds
  if (distance < 0) {
    clearInterval(x);
  }
}, 1000);}
</script>
<div class="ipk-container">
    <div class="ipk-content-container">
        @if($slider)
        <div class="remove-line-height banner">
            @if(strpos($slider->image, 'mp4') == true)
            <video width="100%" height="540" controls>
                <source src="{{ asset('/public/'. $slider->image) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            @else
            <img src="{{ asset('/public/'. $slider->image) }}" />
            @endif
        </div>
        @endif
        <div class="list-category">
            <div class="row slide-wrapper-category">
                @foreach($cates as $item)
                <div class="col m5ths m4 s6 cat-item remove-line-height">
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
                <?php
$img = (new \App\Product())->getProductDefaultImage($item->product_id);
$saleP = (new \App\Product())->getProductById($item->product_id);
?>
                <div class="carousel-item">
                    <div class="flash-deal-icon">Flash deal</div>
                    <div class="carousel-item-wrapper">
                        <div class="item-image remove-line-height"
                            style="background-image: url({{  asset($img ? 'public/' . $img->image : 'public/assets/images/header/logo.svg') }})">
                        </div>
                        <div class="item-infos">
                            <div class="name">{{ $saleP->name }}</div>
                            <div class="description">{{ $saleP->short_description }}</div>
                            <div class="price">
                                <span class="sale">{{ number_format($item->sale_price , 0, ',', '.') }}đ</span><br/>
                                <span class="origin">{{ number_format($saleP->price, 0, ',', '.') }}đ</span>
                            </div>
                            <div class="time hide-on-small-only">
                                <div id="day{{$key}}" class="day">03</div>
                                <div id="hour{{$key}}" class="hour">23</div>
                                <div id="minute{{$key}}" class="minute">59</div>
                                <div id="second{{$key}}" class="second">55</div>
                            </div>
                        </div>
                        <div class="item-infos hide-on-med-and-up item-infos-mobile">
                            <div class="time">
                                <div id="day{{$key}}-mobile" class="day">03</div>
                                <div id="hour{{$key}}-mobile" class="hour">23</div>
                                <div id="minute{{$key}}-mobile" class="minute">59</div>
                                <div id="second{{$key}}-mobile" class="second">55</div>
                            </div>
                        </div>
                    </div>
                    <div class="button-detail">
                        <a href="{{ route('products.show', $saleP->id) }}">Xem chi tiết</a>
                    </div>
                </div>
            <?php
echo ('<script type="text/javascript">
                countDown(' . $key . ', "' . $item->to_date . '")
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
                <a href="{{ url('/categories/-1') }}" class="btn-xem-them" >XEM THÊM</a>
            </div>
        </div>
        <div class="products-block" style="margin-top:-100px">
            <p class="block-title">SẢN PHẨM BÁN CHẠY</p>
            @include('layouts.list-product', ['listProduct' => $proTopSold, 'hasReadMore' => false])
            <div class="container">
                <a href="{{ url('/categories/-2') }}" class="btn-xem-them" >XEM THÊM</a>
            </div>
        </div>
    </div>
</div>
<div class="ipk-container partners-container" style="margin-top: -100px">
    <div class="partners owl-carousel owl-theme">
        @foreach ($partners as $key => $value)
        <div class=" partner-item" style="background-image: url({{ asset('public/' . $value->image) }})"></div>
        @endforeach
    </div>
</div>
@include('layouts.quickview')
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
<script src="{{ asset('public/assets/scripts/iphukien/user/list-product.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
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
    $('.partners').owlCarousel({
    loop: true,
    items:3,
    margin:-5,
    center: true,
    responsive:{
        400:{
            items:3
        },
        600:{
            items:3
        },
        1000:{
            items:6
        }
    }
});
});
$(document).on("click", ".ipk-next-slide", function () {
    $('.sale-product-slider').carousel('next');
});
$(document).on("click", ".ipk-pre-slide", function () {
    $('.sale-product-slider').carousel('prev');
});
$('.slide-wrapper-category').slick({
            infinite: false,
            slidesToShow: 5,
            slidesToScroll: 1,
            responsive: [
                {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    }
                },
                {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                    }
                },
            ]
        });
</script>
@endsection
