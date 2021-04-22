@extends('layouts.app')

@section('title', 'Tên của sản phẩm')

@section('header')
@include('layouts.header', ['status' => 'complete'])
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/ipk-breadcrumb.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/product-details.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/list-product.css') }}">
@endsection

@section('fb-meta-tags')
<meta property="og:url" content="{{ url()->full() }}" />
<meta property="og:type" content="website" />
<meta property="og:title" content="{{ $product->name }}" />
<meta property="og:description" content="{{ $product->full_description }}" />
<meta property="og:image" content="{{ asset('public/assets/images/demo/watch.png') }}" />
@endsection

@section('content')
<div class="ipk-container product-breadcrumbs">
    <div class="ipk-content-container">
        <nav>
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="{{ route('getHome') }}" class="breadcrumb">Trang chủ</a>
                    <a href="{{ route('categories.show', ['id' => $product->category_id]) }}" class="breadcrumb">{{ $product->category_name }}</a>
                    <a href="javascript:void(0)" class="breadcrumb">{{$product->name}}</a>
                </div>
            </div>
        </nav>
    </div>
</div>
<div class="ipk-container product-container">
    <div class="row ipk-content-container">

        @if(count($listImage) > 0)
        <div class="col l1 s3 list-thumb-wrapper">
            <div class="img-block">
                <a href="#!" class="up"></a>
                <div class="thumbs-wrapper">
                    <div class="thumbs">

                        @foreach($listImage as $item)
                        <span style="background-image: url({{ $item }})"
                            data-img="{{ $item }}"></span>
                        @endforeach

                    </div>
                </div>
                <a href="#!" class="down"></a>
            </div>
            <div class="video-icon" 
                data-video="{{ $product->video }}">
                <a href="#!"></a>
            </div>
        </div>
        @else
        <div class="col l1 s3 list-thumb-wrapper">
            <div class="img-block">
                <a href="#!" class="up"></a>
                <div class="thumbs-wrapper">
                    <div class="thumbs">
                        <span style="background-image: url({{ asset('public/assets/images/header/logo.svg') }})"
                            data-img="{{ asset('public/assets/images/header/logo.svg') }}"></span>
                    </div>
                </div>
                <a href="#!" class="down"></a>
            </div>
            <div class="video-icon" 
                data-video="{{ $product->video }}">
                <a href="#!"></a>
            </div>
        </div>
        @endif
        <div class="col l6 s9 main-image-wrapper">
            <span class="full-screen-btn modal-trigger" href="#list-image-popup"></span>
            @if(count($listImage) > 0)
            <div class="main-image is-image" style="background-image: url({{ $listImage[0] }})"></div>
            @else
            <div class="main-image is-image" style="background-image: url({{ asset('public/assets/images/header/logo.svg') }})"></div>
            @endif
        </div>
        <div class="col l5 product-infos">
            <div class="name" id="c-product-name">{{$product->name}}</div>
            <div class="description">{{$product->short_description}}</div>
            @if($product->tag_id != 0)
            <div class="list-tags">
                @if($product->tag_id == 11)
                    <span class="tag hang-moi"></span>
                @elseif($product->tag_id == 12)
                    <span class="tag ban-chay"></span>
                @elseif($product->tag_id == 13)
                    <span class="tag giam-gia"></span>
                @endif
            </div>
            @endif

            <div class="price">
                <div class="origin">{{ number_format($product->price, 0, ',', '.') }}đ</div>
                <div class="sale">{{ number_format($product->sale_price, 0, ',', '.') }}đ <span>Giảm {{ round(($product->price-$product->sale_price) / $product->price * 100) }}%</span></div>
            </div>
            <div class="status-wrapper">
                <div class="status-label">Tình trạng</div>
                <div class="list-status">
                    <span class="status {{ $product->status_id == 11 ? 'het-hang' : '' }}"></span>
                    <span class="status {{ $product->status_id == 12 ? 'dat-truoc' : '' }}"></span>
                    <span class="status {{ $product->status_id == 13 ? 'con-hang' : '' }}"></span>
                </div>
            </div>
            
            <div class="sizes-wrapper">
                <div class="color-label">Màu sác - Kích thước <a href="{{ url('huong-dan-chon-size') }}" target="_blank"  style="text-transform:none;font-weight:400"> (Hướng dẫn chọn size)</a></div>
                <div class="sizes">
                    @foreach($listChildProduct as $item)
                    <!-- lam toi day -->
                    <span class="size" 
                        data-img="{{ asset(isset($item->listImage[0]->image) ? 'public/'.$item->listImage[0]->image : 'public/assets/images/header/logo.svg') }}" 
                        data-productname="{{$item->product->name}}"
                        data-color="{{ $item->product->color_name }}"
                        data-size="{{ $item->product->size_name }}"
                        data-productid="{{$item->product->id}}"
                        data-nhanhproductid="{{$item->product->product_id_nhanh}}"
                        data-price="{{$item->product->sale_price}}"
                    >
                        {{ $item->product->color_name }} - {{ $item->product->size_name }}
                    </span>
                    @endforeach
                    @if(count($listChildProduct) == 0)
                    <span class="size" 
                        data-img="{{ asset('public/assets/images/header/logo.svg') }}" 
                        data-productname="{{$product->name}}"
                        data-color="One Color"
                        data-size="One Size"
                        data-productid="{{$product->id}}"
                        data-nhanhproductid="{{$product->product_id_nhanh}}"
                        data-price="{{$product->sale_price}}"
                    >
                        One Color - One Size
                    </span>
                    @endif
                </div>
            </div>
            <div class="pre-order-block">
                <div class="quantity-input">
                    <span class="decrease-detail">-</span>
                    <input type="number" class="quantity" value="1" id="quantity-detail" />
                    <span class="increase-detail">+</span>
                </div>
                <a href="#!" class="add-to-card-btn-detail" >Thêm vào giỏ hàng</a>
                <a href="#!" class="buy-now-btn" id="buy-now-btn-detail" style="width:180px">Mua ngay</a>
            </div>
        </div>
    </div>
    <div class="product-rating ipk-content-container">
        <div class="fb-share-button" data-href="{{ url()->full() }}" data-layout="button_count"></div>
        <div class="add-wishlist-button" data-type="{{ !isset($wishlist) ? 'add-wishlist' : 'cancel-wishlist' }}">{{ !isset($wishlist) ? 'Thêm vào yêu thích' : 'Hủy yêu thích' }}</div>
    </div>
    <div class="product-descriptions ipk-content-container">
        <div class="title">Mô tả sản phẩm</div>
        <div class="content">
            {{ $product->full_description }}
        </div>
    </div>
    <div class="same-products-block ipk-content-container">
        <p class="block-title">Sản phẩm tương tự</p>
        @include('layouts.list-product', ['listProduct' => $listSameProduct, 'hasReadMore' => false])
    </div>
</div>
@include('layouts.quickview')
<!-- Modal Structure -->
<div id="list-image-popup" class="modal">
    <div class="modal-content">
        <a href="#!" class="modal-close close-list-image-popup"></a>
        @if(count($listImage) > 0)
        <div class="main-image-popup" style="background-image: url({{ $listImage[0] }})"></div>
       @endif
        <div class="list-thumbs-popup">
            <div class="img-block-popup">
                <a href="#!" class="arrow-left"></a>
                <div class="thumbs-wrapper-popup">
                    <div class="thumbs-popup">
                        @if(count($listImage) > 0)
                            @foreach($listImage as $item)
                            <span style="background-image: url({{ $item }})"
                                data-img="{{ $item }}"></span>
                            @endforeach
                        @endif
                    </div>
                </div>
                <a href="#!" class="arrow-right"></a>
            </div>
            <div class="video-icon-popup">
                <a href="#!"></a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('public/assets/scripts/iphukien/user/list-product.js') }}"></script>
<script>
$(document).ready(function () {
    var elems = document.querySelectorAll('#list-image-popup');
    M.Modal.init(elems, {
        'onOpenEnd': calcListThumbsWidth
    });

    function calcListThumbsWidth() {
        let w = $('.thumbs-popup span').length * 122 + ($('.thumbs-popup span').length - 1) * 18;
        $('.thumbs-popup')[0].style.width = w + 'px';
    }

});
$(document).on("click", ".list-thumb-wrapper .up", function () {
    if ($(".thumbs")[0].offsetHeight - $(".thumbs span:not(.hide)")[0].offsetHeight <= 470) return;
    $.each($(".thumbs span"), function (index, value) {
        if (!value.classList.contains('hide')) {
            value.classList.add('hide');
            return false;
        }
    });
});
$(document).on("click", ".list-thumb-wrapper .down", function () {
    if ($(".thumbs span.hide").length == 0) return;
    $(".thumbs span.hide")[$(".thumbs span.hide").length - 1].classList.remove('hide');
});
$(document).on("click", ".color", function () {
    $('.color').removeClass('active');
    $(this).addClass('active');
    $('.main-image')[0].style.backgroundImage = "url(" + $(this).data('img') + ")";
});
$(document).on("click", ".size", function () {
    $('.size').removeClass('active');
    $(this).addClass('active');
    $('.main-image').addClass('is-image');
    $('.main-image').html('');
    $('.main-image')[0].style.backgroundImage = "url(" + $(this).data('img') + ")";
    $('#c-product-name').html($(this).data('productname'));
});
$(document).on("click", ".decrease-detail", function () {
    if ($('.quantity').val() == 0) return;
    $('.quantity').val(parseInt($('.quantity').val()) - 1)
});
$(document).on("click", ".increase-detail", function () {
    $('.quantity').val(parseInt($('.quantity').val()) + 1)
});
$(document).on("click", ".list-thumbs-popup .arrow-left", function () {
    if ($(".thumbs-popup span.hide").length == 0) return;
    $(".thumbs-popup span.hide")[$(".thumbs-popup span.hide").length - 1].classList.remove('hide');
    let w = $('.thumbs-popup span:not(.hide)').length * 122 + ($('.thumbs-popup span:not(.hide)').length - 1) * 18;
    $('.thumbs-popup')[0].style.width = w + 'px';
    $('.thumbs-popup span:not(.hide)')[1].style.marginLeft = '18px';
});
$(document).on("click", ".list-thumbs-popup .arrow-right", function () {
    if ($(".thumbs-popup")[0].offsetWidth <= $(".thumbs-wrapper-popup")[0].offsetWidth) return;
    $.each($(".thumbs-popup span"), function (index, value) {
        if (!value.classList.contains('hide')) {
            value.classList.add('hide');
            // reset width
            let w = $('.thumbs-popup span:not(.hide)').length * 122 + ($('.thumbs-popup span:not(.hide)').length - 1) * 18;
            $('.thumbs-popup')[0].style.width = w + 'px';
            $('.thumbs-popup span:not(.hide)')[0].style.marginLeft = '0'
            // return
            return false;
        }
    });
});
$(document).on("click", ".thumbs-popup span", function () {
    $('.main-image-popup')[0].style.backgroundImage = "url(" + $(this).data('img') + ")";
});

$(document).on("click", ".add-wishlist-button", function () {
    $.ajax({
        url: `{{route('ajax.add-to-wishlist')}}`,
        type: 'post',
        data: { 'productId': '{{$product->id}}', 'type': $(this).data('type'), '_token': `{{ csrf_token() }}` }
    }).done(function (data) {
        console.log(data)
        if (JSON.parse(data).code == 1) {
            M.toast({
                html: 'Cập nhật thành công',
                classes: 'add-cart-success'
            })
            location.reload();
        } else {
            let mes = JSON.parse(data).message ? JSON.parse(data).message : 'Cập nhật không thành công';
            M.toast({
                html: mes,
                classes: 'add-cart-fail'
            })
        }
    })
    .fail(function () {
        alert('Cập nhật thất bại')
    })

});


$(document).on("click", ".thumbs span", function () {
    $('.main-image').addClass('is-image');
    $('.main-image').html('');
    $('.main-image')[0].style.backgroundImage = "url(" + $(this).data('img') + ")";
});
$(document).on("click", ".custom-fb-share-button", function () {
    $('.fb-share-button').trigger( "click" );
});
$(document).on("click", ".video-icon", function () {
    $(".ipk-preloader").removeClass('hide');
    let str = `<iframe class="yt-player" src="${$(this).data('video')}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
    $('.main-image')[0].style.backgroundImage = 'unset';
    $('.main-image').removeClass('is-image');
    $('.main-image').html(str);
    $('.yt-player').height($('.yt-player').width());
    $(".ipk-preloader").addClass('hide');
});

function updateCart() {
    let listSizeElement = $(".sizes .size.active");
    if(listSizeElement.length == 0) {
        M.toast({
            html: 'Vui lòng chọn màu sác - kích thước',
            classes: 'add-cart-fail'
        })
        return false;
    }
    // lam toi day
    let productid = listSizeElement[0].dataset.productid;
    let choosenColor = listSizeElement[0].dataset.color;
    let choosenSize = listSizeElement[0].dataset.size;
    let price = listSizeElement[0].dataset.price;
    let nhanhProductId = listSizeElement[0].dataset.nhanhproductid;
    let img = listSizeElement[0].dataset.img;
    let prodName = listSizeElement[0].dataset.productname;

    let quantity = $("#quantity-detail").val() == 0 ? 1 : $("#quantity-detail").val();

    let cart = localStorage.getItem('ipk_cart') ? JSON.parse(localStorage.getItem('ipk_cart')) : {};
    
    if(cart[productid]) {
        cart[productid].quantity = parseInt(cart[productid].quantity) + parseInt(quantity);
    } else {
        cart[productid] = {
            color: choosenColor,
            size: choosenSize,
            quantity: quantity,
            salePrice: price,
            image: img,
            name: prodName,
            nhanhPorductId: nhanhProductId
        };
    }
    localStorage.setItem('ipk_cart',  JSON.stringify(cart));
    return true;
}
$(document).on("click","#buy-now-btn-detail",function() {
    if(!updateCart()) return;

    window.location.href = "{{ route('user.cart') }}";
});
$(document).on("click",".add-to-card-btn-detail",function() {
    let updateRes = updateCart();
    if(updateRes) {
        M.toast({
            html: 'Cập nhật giỏ hàng thành công',
            classes: 'add-cart-success'
        });
    }

});
</script>
@endsection
