@extends('layouts.app')

@section('title', 'Tên danh mục sản phẩm')

@section('header')
@include('layouts.header', ['status' => 'complete'])
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('public/iphukien/user/header.css') }}">
<link rel="stylesheet" href="{{ asset('public/iphukien/user/ipk-breadcrumb.css') }}">
<link rel="stylesheet" href="{{ asset('public/iphukien/user/category-details.css') }}">
<link rel="stylesheet" href="{{ asset('public/iphukien/user/footer.css') }}">
@endsection

@section('content')
<div class="ipk-container product-breadcrumbs">
    <div class="ipk-content-container">
        <nav>
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="{{ route('home') }}" class="breadcrumb">Trang chủ</a>
                    <a href="javascript:void(0)" class="breadcrumb">Danh mục sản phẩm</a>
                </div>
            </div>
        </nav>
    </div>
</div>
@endsection

@section('footer')
@include('layouts.footer', ['status' => 'complete'])
@endsection

@section('scripts')
<script src="{{ asset('public/assets/scripts/iphukien/user/header.js') }}"></script>
<script src="{{ asset('public/assets/scripts/iphukien/user/category-details.js') }}"></script>
@endsection