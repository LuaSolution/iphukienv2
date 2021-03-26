@extends('layouts.app')

@section('title', 'iPhuKien - Giỏ hàng')

@section('header')
@include('layouts.header', ['status' => 'complete'])
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/cart.css') }}">
@endsection

@section('content')
<div class="ipk-container cart-container">
    <div class="ipk-content-container">
        <div class="title">Giỏ hàng</div>
        <div class="products-wrapper">
            <div class="row products">
                <div class="product col l3">
                    <div class="img" style="background-image: url({{ asset('public/assets/images/demo/ipod.png') }})"></div>
                    <div class="name">Tên của Sản Phẩm này có độ dài là hai dòng như...</div>
                    <div class="price-color">
                        <span class="price">18.200.000đ</span>
                        <span class="color">XS, Xanh lá</span>
                    </div>
                    <div class="quantity-delete">
                        <div class="quantity">
                            <span class="sub">-</span>
                            <input type="number" name="quantity" class="quantity-input" value="2" />
                            <span class="plus">+</span>
                        </div>
                        <div class="delete-link">
                            <a href="#!">Xóa</a>
                        </div>
                    </div>
                </div>
                <div class="product col l3">
                    <div class="img" style="background-image: url({{ asset('public/assets/images/demo/ipod.png') }})"></div>
                    <div class="name">Tên của Sản Phẩm này có độ dài là hai dòng như...</div>
                    <div class="price-color">
                        <span class="price">18.200.000đ</span>
                        <span class="color">XS, Xanh lá</span>
                    </div>
                    <div class="quantity-delete">
                        <div class="quantity">
                            <span class="sub">-</span>
                            <input type="number" name="quantity" class="quantity-input" value="2" />
                            <span class="plus">+</span>
                        </div>
                        <div class="delete-link">
                            <a href="#!">Xóa</a>
                        </div>
                    </div>
                </div>
                <div class="product col l3">
                    <div class="img" style="background-image: url({{ asset('public/assets/images/demo/ipod.png') }})"></div>
                    <div class="name">Tên của Sản Phẩm này có độ dài là hai dòng như...</div>
                    <div class="price-color">
                        <span class="price">18.200.000đ</span>
                        <span class="color">XS, Xanh lá</span>
                    </div>
                    <div class="quantity-delete">
                        <div class="quantity">
                            <span class="sub">-</span>
                            <input type="number" name="quantity" class="quantity-input" value="2" />
                            <span class="plus">+</span>
                        </div>
                        <div class="delete-link">
                            <a href="#!">Xóa</a>
                        </div>
                    </div>
                </div>
                <div class="product col l3">
                    <div class="img" style="background-image: url({{ asset('public/assets/images/demo/ipod.png') }})"></div>
                    <div class="name">Tên của Sản Phẩm này có độ dài là hai dòng như...</div>
                    <div class="price-color">
                        <span class="price">18.200.000đ</span>
                        <span class="color">XS, Xanh lá</span>
                    </div>
                    <div class="quantity-delete">
                        <div class="quantity">
                            <span class="sub">-</span>
                            <input type="number" name="quantity" class="quantity-input" value="2" />
                            <span class="plus">+</span>
                        </div>
                        <div class="delete-link">
                            <a href="#!">Xóa</a>
                        </div>
                    </div>
                </div>
                <div class="product col l3">
                    <div class="img" style="background-image: url({{ asset('public/assets/images/demo/ipod.png') }})"></div>
                    <div class="name">Tên của Sản Phẩm này có độ dài là hai dòng như...</div>
                    <div class="price-color">
                        <span class="price">18.200.000đ</span>
                        <span class="color">XS, Xanh lá</span>
                    </div>
                    <div class="quantity-delete">
                        <div class="quantity">
                            <span class="sub">-</span>
                            <input type="number" name="quantity" class="quantity-input" value="2" />
                            <span class="plus">+</span>
                        </div>
                        <div class="delete-link">
                            <a href="#!">Xóa</a>
                        </div>
                    </div>
                </div>
                <div class="product col l3">
                    <div class="img" style="background-image: url({{ asset('public/assets/images/demo/ipod.png') }})"></div>
                    <div class="name">Tên của Sản Phẩm này có độ dài là hai dòng như...</div>
                    <div class="price-color">
                        <span class="price">18.200.000đ</span>
                        <span class="color">XS, Xanh lá</span>
                    </div>
                    <div class="quantity-delete">
                        <div class="quantity">
                            <span class="sub">-</span>
                            <input type="number" name="quantity" class="quantity-input" value="2" />
                            <span class="plus">+</span>
                        </div>
                        <div class="delete-link">
                            <a href="#!">Xóa</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="list-button-wrapper">
                <div class="list-button">
                    <a href="{{ url()->previous() }}" class="come-back">Quay trở lại</a>
                    <a href="{{ route('user.payment') }}" class="complete">Hoàn tất</a>
                    <div class="sum">
                        <div class="sum-price">TỔNG 1.887.000 VNĐ</div>
                        <div class="count-products">Có x sản phẩm</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('footer')
@include('layouts.footer', ['status' => 'complete'])
@endsection

@section('scripts')
<script src="{{ asset('public/assets/scripts/iphukien/user/cart.js') }}"></script>
@endsection