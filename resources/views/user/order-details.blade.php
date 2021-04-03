@extends('layouts.app')

@section('title', 'Chi tiết đơn hàng #1234')

@section('header')
@include('layouts.header', ['status' => 'complete'])
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/header.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/user-top.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/order-details.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/footer.css') }}">
@endsection

@section('content')
<div class="ipk-container">
    <div class="ipk-content-container order-details-container">
        @include('layouts.user-top', ['status' => 1])
        <div class="order-code">ĐƠN HÀNG #{{$order->nhanh_order_id}}</div>
        <div class="list-status">
            <div class="status finish"><span>Chưa xác nhận</span></div>
            <div class="status current"><span>Khách hủy</span></div>
            <div class="status"><span>Đã xác nhận</span></div>
            <div class="status"><span>Đang đóng gói</span></div>
            <div class="status"><span>Đang giao hàng</span></div>
            <div class="status"><span>Thành công</span></div>
        </div>
        
        <iframe class="order-detail-iframe" src="{{$orderDetailUrl}}"  width="100%" height="600"></iframe>
        
        <div class="list-products">
            <div class="row products">
                @foreach($orderDetail as $detail)
                <div class="product col l3">
                    <div class="img" style="background-image: url({{ asset('public/assets/images/demo/ipod.png') }})"></div>
                    <div class="name">Tên của Sản Phẩm này có độ dài là hai dòng như...</div>
                    <div class="price-color">
                        <span class="price">18.200.000đ</span>
                        <span class="color">XS, Xanh lá</span>
                    </div>
                    <div class="quantity">
                        Số lượng<br />
                        01
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="row order-details">
            <div class="col l6 s12 order-detail-left">
                <div class="order-detail-title">Chi tiết đơn hàng</div>
                <div class="left-info receiver-info">Mã đơn hàng: #26v734285</div>
                <div class="left-info">Trạng thái: Đã xác nhận</div>
                <div class="left-info">Ngày đặt hàng: 15-02-2020</div>
                <div class="left-info">Hình thức thanh toán: Momo</div>
                <div class="left-info">Dự kiến nhận hàng: 20-02-2020</div>
                <div class="left-info receiver-info">Người nhận: Rose Charlie</div>
                <div class="left-info">Địa chỉ: 87 đường 17 Linh Trung Thủ Đức</div>
                <div class="left-info">Số điện thoại: 0839 056 021</div>
                <div class="left-info">Email: rosecharlie171297@gmail.com</div>
            </div>
            <div class="col l6 s12 order-detail-right">
                <div class="right-info">
                    <span>Số lượng sản phẩm</span>
                    <span>5</span>
                </div>
                <div class="right-info">
                    <span>Tiền hàng</span>
                    <span>548.000 VNĐ</span>
                </div>
                <div class="right-info">
                    <span>Phí giao hàng</span>
                    <span>50.000 VNĐ</span>
                </div>
                <div class="right-info sum">
                    <span>Tổng cộng</span>
                    <span>598.000 VNĐ</span>
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
<script src="{{ asset('public/assets/scripts/iphukien/user/header.js') }}"></script>
<script>
$(document).ready(function () {
    $('.user-top-dropdown').dropdown();
});
</script>
@endsection