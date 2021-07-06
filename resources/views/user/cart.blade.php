@extends('layouts.app')

@section('title', 'Giỏ hàng')

@section('header')
@include('layouts.header', ['status' => 'complete'])
@endsection

@section('styles')
<link
href="{{ asset('public/metronic_assets/global/plugins/font-awesome/css/font-awesome.min.css') }}"
rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/cart.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/ipk-breadcrumb.css') }}">
@endsection

@section('content')
<div class="ipk-container product-breadcrumbs">
        <div class="ipk-content-container">
            <nav>
                <div class="nav-wrapper">
                    <div class="col s12">
                        <a href="{{ route('getHome') }}" class="breadcrumb">Trang chủ</a>
                        <a href="javascript:void(0)" class="breadcrumb">Giỏ hàng</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
<div class="ipk-container cart-container" id="cart-page">
    <div class="ipk-content-container">
        <div class="title">Giỏ hàng <i class="fa fa-arrow-right"></i> <span class="pass"> Thanh toán</span></div>
        <div class="products-wrapper">
            <div class="row products" id="products"></div>
            <div class="list-button-wrapper">
                <div class="list-button">
                    <a href="{{ url()->previous() }}" class="come-back">Quay trở lại</a>
                    <a href="{{ route('user.payment') }}" class="complete">Hoàn tất</a>
                    <div class="sum">
                        <div class="sum-price" id="sum-price"></div>
                        <div class="count-products" id="count-products"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection



@section('scripts')
<script>
$(document).on("click", ".quantity .sub", function () {
    let doc = $(this).parent()[0];
    let productId = $(this).data('productid');
    let newQuantity, cart, sum=0, count=0;
    for (var i = 0; i < doc.childNodes.length; i++) {
        if (doc.childNodes[i].className == "quantity-input") {
            if(doc.childNodes[i].value == 0)  break;
            let newQuantity = parseInt(doc.childNodes[i].value) - 1;
            doc.childNodes[i].value = newQuantity;
            cart = localStorage.getItem('ipk_cart') ? JSON.parse(localStorage.getItem('ipk_cart')) : {};
            cart[productId].quantity = newQuantity;
            localStorage.setItem('ipk_cart',  JSON.stringify(cart));
            for (const i in cart) {
                sum += cart[i].salePrice * cart[i].quantity;
                count++;
            }
            $("#sum-price").html(`TỔNG ${numberWithCommas(sum)} VNĐ`);
            $("#count-products").html(`Có ${count} sản phẩm`);
            break;
        }
    }
});
$(document).on("click", ".quantity .plus", function () {
    let doc = $(this).parent()[0];
    let productId = $(this).data('productid');
    let newQuantity, cart, sum=0, count=0;
    for (var i = 0; i < doc.childNodes.length; i++) {
        if (doc.childNodes[i].className == "quantity-input") {
            newQuantity = parseInt(doc.childNodes[i].value) + 1;
            doc.childNodes[i].value = newQuantity;
            cart = localStorage.getItem('ipk_cart') ? JSON.parse(localStorage.getItem('ipk_cart')) : {};
            cart[productId].quantity = newQuantity;
            localStorage.setItem('ipk_cart',  JSON.stringify(cart));
            for (const i in cart) {
                sum += cart[i].salePrice * cart[i].quantity;
                count++;
            }
            $("#sum-price").html(`TỔNG ${numberWithCommas(sum)} VNĐ`);
            $("#count-products").html(`Có ${count} sản phẩm`);
            break;
        }
    }
});
$(document).on("click", ".delete-link a", function () {
    $(this).parent()[0].parentElement.parentElement.remove();
    console.log($(this).data('productid'))
    let cart = localStorage.getItem('ipk_cart') ? JSON.parse(localStorage.getItem('ipk_cart')) : {};
    console.log(cart[$(this).data('productid')])
    let newCart = {};
    let sum=0, count=0;
    for (const i in cart) {
        if(i != $(this).data('productid')) {
            newCart[i] = cart[i];
        }

    }
    for (const i in newCart) {
        sum += cart[i].salePrice * cart[i].quantity;
        count++;
    }
    localStorage.setItem('ipk_cart',  JSON.stringify(newCart));
    $("#sum-price").html(`TỔNG ${numberWithCommas(sum)} VNĐ`);
    $("#count-products").html(`Có ${count} sản phẩm`);
});
$(document).ready(function () {
    let cart = localStorage.getItem('ipk_cart') ? JSON.parse(localStorage.getItem('ipk_cart')) : {};
    console.log(cart, 3432234);
    let str = "";
    let sum = 0;
    let count = 0;
    // console.log(cart);
    for (const i in cart) {
        str += `<div class="product col l3">`
                + `<div class="img" style="background-image: url(${cart[i].image})"></div>`
                + `<div class="name">${cart[i].name}</div>`
                + `<div class="price-color">`
                + `<span class="price">${numberWithCommas(cart[i].salePrice)}đ</span>`
                + `<span class="color-size"><div class="size">${cart[i].size}</div><span>,</span> <div>${cart[i].color}</div></span>`
                + `</div>`
                + `<div class="quantity-delete">`
                + `<div class="quantity">`
                + `<span class="sub" data-productid="${i}">-</span>`
                + `<input type="number" name="quantity" class="quantity-input" value="${cart[i].quantity}" />`
                + `<span class="plus" data-productid="${i}">+</span>`
                + `</div>`
                + `<div class="delete-link">`
                + `<a href="#!" data-productid="${i}">Xóa</a>`
                + `</div>`
                + `</div>`
                + `</div>`;
        sum += cart[i].salePrice * cart[i].quantity;
        count++;
    }
    $("#products").html(str);
    $("#sum-price").html(`<span>TỔNG TIỀN:</span> <span>${numberWithCommas(sum)} VNĐ</span>`);
    $("#count-products").html(`Có ${count} sản phẩm`);
});
</script>
@endsection
