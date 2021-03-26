@extends('layouts.app')

@section('title', 'Lịch sử mua hàng')

@section('header')
@include('layouts.header', ['status' => 'complete'])
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/user-top.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/orders.css') }}">
@endsection

@section('content')
<div class="ipk-container">
    <div class="ipk-content-container orders-container">
        @include('layouts.user-top', ['status' => 1])
        <div class="orders-txt">Lịch sử mua hàng</div>
        <div class="list-order">
            <div class="order">
                <div class="order-code">Đơn hàng: #79788965 - <i>Đã giao hàng thành công</i></div>
                <div class="receive-date">Ngày nhận hàng: 20-02-2020</div>
                <div class="sum">500.000 VND</div>
            </div>
            <div class="order">
                <div class="order-code">Đơn hàng: #79788965 - <i>Đã giao hàng thành công</i></div>
                <div class="receive-date">Ngày nhận hàng: 20-02-2020</div>
                <div class="sum">500.000 VND</div>
            </div>
            <div class="order">
                <div class="order-code">Đơn hàng: #79788965 - <i>Đã giao hàng thành công</i></div>
                <div class="receive-date">Ngày nhận hàng: 20-02-2020</div>
                <div class="sum">500.000 VND</div>
            </div>
            <div class="order">
                <div class="order-code">Đơn hàng: #79788965 - <i>Đã giao hàng thành công</i></div>
                <div class="receive-date">Ngày nhận hàng: 20-02-2020</div>
                <div class="sum">500.000 VND</div>
            </div>
        </div>
        <div class="load-more">
            <a href="javascript:void(0)">Xem thêm</a>
        </div>
    </div>
</div>
</div>
@endsection

@section('footer')
@include('layouts.footer', ['status' => 'complete'])
@endsection

@section('scripts')
<script src="{{ asset('public/assets/scripts/iphukien/user/user-top.js') }}"></script>
@endsection