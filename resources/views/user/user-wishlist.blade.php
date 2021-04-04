@extends('layouts.app')

@section('title', 'Danh sách yêu thích')

@section('header')
@include('layouts.header', ['status' => 'complete'])
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/user-top.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/user-wishlist.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/list-product.css') }}">
@endsection

@section('content')
<div class="ipk-container">
    <div class="ipk-content-container user-wishlist-container">
        @include('layouts.user-top', ['status' => 1])
        <div class="user-wishlist-txt">DANH SÁCH YÊU THÍCH</div>
        @include('layouts.list-product', ['fromPage' => 'getHome'])
    </div>
</div>
</div>
@endsection



@section('scripts')
<script src="{{ asset('public/assets/scripts/iphukien/user/user-top.js') }}"></script>
<script src="{{ asset('public/assets/scripts/iphukien/user/list-product.js') }}"></script>
@endsection
