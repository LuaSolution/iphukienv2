@extends('layouts.app')

@section('title', 'Tìm kiếm theo từ khóa {{$keyword}}')

@section('header')
@include('layouts.header', ['status' => 'complete'])
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/category-details.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/list-product.css') }}">
@endsection

@section('content')
<div class="ipk-container categories-container">
    <div class="ipk-content-container">
        <div class="category-title">Tìm kiếm theo từ khóa "{{$keyword}}"</div>
    </div>
    <div class="ipk-content-container">
        @include('layouts.list-product', ['listProduct' => $listProduct])
    </div>
    @include('layouts.quickview')
</div>
@endsection

@section('scripts')
<script src="{{ asset('public/assets/scripts/iphukien/user/list-product.js') }}"></script>
@endsection