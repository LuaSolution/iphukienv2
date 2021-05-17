@extends('layouts.app')

@section('title', 'Chi tiết đơn hàng #1234')

@section('header')
@include('layouts.header', ['status' => 'complete'])
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('public/iphukien/user/header.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/user-top.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/order-details.css') }}">
<link rel="stylesheet" href="{{ asset('public/iphukien/user/footer.css') }}">
<link rel="stylesheet" href="{{ asset('public/iphukien/user/common.css') }}">
@endsection

@section('content')
<div class="ipk-container">
    <div class="ipk-content-container order-details-container">
        @include('layouts.user-top', ['status' => 1])
        <div class="order-code">ĐƠN HÀNG #{{$order->nhanh_order_id}}</div>
        <!-- <div class="list-status">
            <div class="status finish"><span>Chưa xác nhận</span></div>
            <div class="status current"><span>Khách hủy</span></div>
            <div class="status"><span>Đã xác nhận</span></div>
            <div class="status"><span>Đang đóng gói</span></div>
            <div class="status"><span>Đang giao hàng</span></div>
            <div class="status"><span>Thành công</span></div>
        </div> -->

        <iframe class="order-detail-iframe" src="{{$orderDetailUrl}}"  width="100%" height="600"></iframe>

        <div class="list-products">
            <div class="row products">
                @foreach($orderDetail as $detail)
                <?php
$listImg = \App\ProductImage::where('product_id', '=', $detail->product_id)->get();
$img = count($listImg) > 0 ? asset('public/' . $listImg[0]->image) : asset('public/assets/images/header/logo.svg');
?>
                <div class="product col l3" style='margin-left: 0px;padding-right:10px'>
                    <div class="img" style="background-image: url({{ $img }})"></div>
                    <div class="name">{{$detail->product_name}}</div>
                    <div class="price-color">
                        <span class="price">{{number_format($detail->total_price , 0, ',', '.')}}đ</span>
                        <span class="color">{{$detail->size_name}}, {{$detail->color_name}}</span>
                    </div>
                    <div class="quantity">
                        Số lượng<br />
                        {{$detail->total_count}}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="row order-details">
            <div class="col l6 s12 order-detail-left">
                <div class="order-detail-title">Chi tiết đơn hàng</div>
                <div class="left-info receiver-info">Mã đơn hàng: #{{$order->nhanh_order_id}}</div>
                <div class="left-info">Trạng thái: {{$order->status}}</div>
                <div class="left-info">Ngày đặt hàng: {{date("Y-m-d", strtotime($order->created_at))}}</div>
                <div class="left-info">Hình thức thanh toán: {{$order->payment_method_name}}</div>
                <div class="left-info">Dự kiến nhận hàng: {{date("Y-m-d", strtotime($order->delivery_date))}}</div>
                <div class="left-info receiver-info">Người nhận: {{$order->receiver_name}}</div>
                <div class="left-info">Địa chỉ: {{$order->receiver_address}}</div>
                <div class="left-info">Số điện thoại: {{$order->receiver_phone}}</div>
                <div class="left-info">Email: {{$order->receiver_email}}</div>
            </div>
            <div class="col l6 s12 order-detail-right">
                <div class="right-info">
                    <span>Số lượng sản phẩm</span>
                    <span>{{$countAllOrderProduct}}</span>
                </div>
                <div class="right-info">
                    <span>Tiền hàng</span>
                    <span>{{number_format($countAllOrderPrice , 0, ',', '.')}} VNĐ</span>
                </div>
                <div class="right-info">
                    <span>Phí giao hàng</span>
                    <span>{{$countAllOrderPrice < 500000 ? number_format($order->ship_fee , 0, ',', '.') : 0 }} VNĐ</span>
                </div>
                <div class="right-info sum">
                    <span>Tổng cộng</span>
                    <span>{{ number_format($order->ship_fee+$countAllOrderPrice , 0, ',', '.') }} VNĐ</span>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection



@section('scripts')
<script src="{{ asset('public/assets/scripts/iphukien/user/header.js') }}"></script>
<script src="{{ asset('public/assets/scripts/iphukien/user/user-top.js') }}"></script>
@endsection
