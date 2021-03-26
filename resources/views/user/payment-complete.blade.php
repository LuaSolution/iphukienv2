@extends('layouts.app')

@section('title', 'Thanh toán thành công')

@section('header')
@include('layouts.header', ['status' => 'complete'])
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/payment-complete.css') }}">
@endsection

@section('content')
<div class="ipk-container">
    <div class="ipk-content-container">
        <div class="payment-complete-container">
            <div class="complete-avatar"></div>
            <div class="complete-title">Đặt hàng thành công</div>
            <div class="complete-info-txt">Thông tin đơn hàng của quý khách</div>
            <div class="order-code">Mã đơn hàng: HDHDHDHD7897878</div>
            <div class="order-name">Tên của cái sản phẩm này có độ dài tối đa 2 hàngvà thêm 3 dấu ... ở cuối</div>
            <div class="order-cost">Tổng tiền: 32.000.000 đ</div>
            <div class="welcome-txt">Rất hân hạnh được phục vụ bạn</div>
            <div class="list-btn">
                <a href="{{ route('getHome') }}">Tiếp tục mua sản phẩm</a>
                <a href="{{ route('user.order-details', 1) }}">Chi tiết đơn hàng</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
@include('layouts.footer', ['status' => 'complete'])
@endsection