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

@section('fb-sdk')
<div id="fb-root"></div>
<script>
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
@endsection

@section('content')
<div class="ipk-container product-breadcrumbs">
    <div class="ipk-content-container">
        <nav>
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="{{ route('getHome') }}" class="breadcrumb">Trang chủ</a>
                    <a href="{{ route('categories.show', ['id' => $product->cateogory_id]) }}" class="breadcrumb">Danh mục sản phẩm</a>
                    <a href="javascript:void(0)" class="breadcrumb">Trang chi tiết hiện tại</a>
                </div>
            </div>
        </nav>
    </div>
</div>
<div class="ipk-container product-container">
    <div class="row ipk-content-container">
        <div class="col l1 list-thumb-wrapper">
            <div class="img-block">
                <a href="#!" class="up"></a>
                <div class="thumbs-wrapper">
                    <div class="thumbs">
                        @foreach($productColor as $item)
                        <span style="background-image: url({{ asset('public/' . $item->image) }})"
                            data-img="{{ asset('public/' . $item->image) }}"></span>
                        @endforeach
                    </div>
                </div>
                <a href="#!" class="down"></a>
            </div>
            <div class="video-icon">
                <a href="#!"></a>
            </div>
        </div>
        <div class="col l6 main-image-wrapper">
            <span class="full-screen-btn modal-trigger" href="#list-image-popup"></span>
            <div class="main-image" style="background-image: url({{ asset('public/' . $productColor[0]->image) }})"></div>
        </div>
        <div class="col l5 product-infos">
            <div class="name">{{$product->name}}</div>
            <div class="description">{{$product->short_description}}</div>
            <div class="list-tags">
                <span class="tag {{ $product->tag_id == 11 ? 'hang-moi' : '' }}"></span>
                <span class="tag {{ $product->tag_id == 12 ? 'ban-chay' : '' }}"></span>
                <span class="tag {{ $product->tag_id == 13 ? 'giam-gia' : '' }}"></span>
            </div>
            <div class="price">
                <div class="origin">{{ $product->price }}đ</div>
                <div class="sale">{{ $product->sale_price }}đ <span>Giảm {{ round(($product->price-$product->sale_price) / $product->price * 100) }}%</span></div>
            </div>
            <div class="status-wrapper">
                <div class="status-label">Tình trạng</div>
                <div class="list-status">
                    <span class="status {{ $product->status_id == 11 ? 'het-hang' : '' }}"></span>
                    <span class="status {{ $product->status_id == 12 ? 'dat-truoc' : '' }}"></span>
                    <span class="status {{ $product->status_id == 13 ? 'con-hang' : '' }}"></span>
                </div>
            </div>
            <div class="colors-wrapper">
                <div class="color-label">Màu sắc</div>
                <div class="colors">
                    @foreach($productColor as $item)
                    <span class="color" data-colorid="{{$item->color_id}}" data-colorname="{{$item->color_name}}" data-img="{{ asset('public/' . $item->image) }}">{{$item->color_name}}</span>
                    @endforeach
                </div>
            </div>
            <div class="sizes-wrapper">
                <div class="size-label">Kích thước<a href="#!" target="_blank">(Hướng dẫn chọn size)</a></div>
                <div class="sizes">
                    @foreach($productSize as $item)
                    <span class="size" data-sizeid="{{$item->size_id}}" data-sizename="{{$item->name}}">{{ $item->name }}</span>
                    @endforeach
                </div>
            </div>
            <div class="pre-order-block">
                <div class="quantity-input">
                    <span class="decrease">-</span>
                    <input type="number" class="quantity" value="0" id="quantity" />
                    <span class="increase">+</span>
                </div>
                <a href="#!" class="add-to-card-btn">Thêm vào giỏ hàng</a>
                <a href="#!" class="buy-now-btn" id="buy-now-btn">Mua ngay</a>
            </div>
        </div>
    </div>
    <div class="product-rating ipk-content-container">
        <div class="fb-share-button" data-href="{{ url()->full() }}" data-layout="button_count"></div>
        <div class="add-wishlist-button">Thêm vào yêu thích</div>
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
<!-- Modal Structure -->
<div id="list-image-popup" class="modal">
    <div class="modal-content">
        <a href="#!" class="modal-close close-list-image-popup"></a>
        <div class="main-image-popup" style="background-image: url({{ asset('public/' . $productColor[0]->image) }})"></div>
        <div class="list-thumbs-popup">
            <div class="img-block-popup">
                <a href="#!" class="arrow-left"></a>
                <div class="thumbs-wrapper-popup">
                    <div class="thumbs-popup">
                        @foreach($productColor as $item)
                        <span style="background-image: url({{ asset('public/' . $item->image) }})"
                            data-img="{{ asset('public/' . $item->image) }}"></span>
                        @endforeach
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

@section('footer')
@include('layouts.footer', ['status' => 'complete'])
@endsection

@section('scripts')
<script src="{{ asset('public/assets/scripts/iphukien/user/product-details.js') }}"></script>
<script src="{{ asset('public/assets/scripts/iphukien/user/list-product.js') }}"></script>
<script>
function updateCart() {
    let listColorElement = $(".colors .color.active");
    if(listColorElement.length == 0) {
        M.toast({
            html: 'Vui lòng chọn màu sắc',
            classes: 'add-cart-fail'
        })
        return false;
    }
    let choosenColor = listColorElement[0].dataset.colorid;
    let choosenColorName = listColorElement[0].dataset.colorname;

    let listSizeElement = $(".sizes .size.active");
    if(listSizeElement.length == 0) {
        M.toast({
            html: 'Vui lòng chọn kích thước',
            classes: 'add-cart-fail'
        })
        return false;
    }
    let choosenSize = listSizeElement[0].dataset.sizeid;
    let choosenSizeName = listSizeElement[0].dataset.sizename;
    
    let quantity = $("#quantity").val() == 0 ? 1 : $("#quantity").val();

    let cart = localStorage.getItem('ipk_cart') ? JSON.parse(localStorage.getItem('ipk_cart')) : {};
    // console.log(cart);
    if(cart["{{ $product->id }}"]) {
        cart["{{ $product->id }}"].quantity = quantity;
    } else {
        cart["{{ $product->id }}"] = {
            color: choosenColor, 
            size: choosenSize, 
            quantity: quantity,
            image: "{{asset('public/' . $productColor[0]->image)}}",
            salePrice: "{{ $product->sale_price }}",
            name: "{{ $product->name }}",
            sizeName: choosenSizeName,
            colorName: choosenColorName,
            nhanhPorductId: "{{ $product->product_id_nhanh }}"
        };
    }
    localStorage.setItem('ipk_cart',  JSON.stringify(cart));
    return true;
}
$(document).on("click","#buy-now-btn",function() {
    if(!updateCart()) return;
    
    window.location.href = "{{ route('user.cart') }}";
});
$(document).on("click",".add-to-card-btn",function() {
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