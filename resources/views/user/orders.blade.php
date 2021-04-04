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
            @foreach($listOrder as $order)
            <div class="order">
                <div class="order-code">Đơn hàng: <a href="{{ route('user.order-details', $order->id) }}">#{{$order->nhanh_order_id}}</a> - <i>{{$order->status}}</i></div>
                <div class="receive-date">Ngày nhận hàng: {{date('Y-m-d', strtotime($order->delivery_date))}}</div>
                <div class="sum">{{number_format($order->total_order_price , 0, ',', '.')}} VND</div>
            </div>
            @endforeach
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