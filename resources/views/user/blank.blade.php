@extends('layouts.app')

@section('title', 'Tên danh mục sản phẩm')

@section('header')
@include('layouts.header', ['status' => 'complete'])
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('public/iphukien/user/ipk-breadcrumb.css') }}">
<link rel="stylesheet" href="{{ asset('public/iphukien/user/category-details.css') }}">
@endsection

@section('content')
<div class="ipk-container login-container">
    <div class="ipk-content-container">
        <div class="row">
            {!! $data->content !!}
        </div>
    </div>
</div>
@endsection

@section('footer')
@include('layouts.footer', ['status' => 'complete'])
@endsection

@section('scripts')
<script src="{{ asset('public/assets/scripts/iphukien/user/category-details.js') }}"></script>
@endsection