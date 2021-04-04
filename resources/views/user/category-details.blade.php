@extends('layouts.app')

@section('title', 'Tên danh mục sản phẩm')

@section('header')
@include('layouts.header', ['status' => 'complete'])
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/ipk-breadcrumb.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/category-details.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/list-product.css') }}">
@endsection

@section('content')
<div class="ipk-container product-breadcrumbs">
    <div class="ipk-content-container">
        <nav>
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="{{ route('getHome') }}" class="breadcrumb">Trang chủ</a>
                    <a href="javascript:void(0)" class="breadcrumb">{{ $category->title }}</a>
                </div>
            </div>
        </nav>
    </div>
</div>
<div class="ipk-container categories-container">
    <div class="ipk-content-container">
        <div class="category-title">{{ $category->title }}</div>
        <div class="filter-block">
            <a href="#" data-target="filter-slide-out" class="sidenav-trigger category-filter">Bộ lọc</a>
            <select>
                <option value="" disabled selected>Sắp xếp</option>
                <option value="name-a-to-z">Tên: A-Z</option>
                <option value="name-z-to-a">Tên: Z-A</option>
                <option value="price-low-to-high">Giá: Thấp - Cao</option>
                <option value="price-high-to-low">Giá: Cao - Thấp</option>
            </select>
        </div>
    </div>
    <div class="ipk-content-container">
        @include('layouts.list-product', ['listProduct' => $listProduct])

        <div class="paging">
        {{ $listProduct->links() }}
            <!-- <a href="#!" class="previous"><</a>
            <a href="#!" class="page-item">1</a>
            <a href="#!" class="page-item">2</a>
            <a href="#!" class="page-item current">3</a>
            <a href="#!" class="page-item">4</a>
            <a href="#!" class="page-item">5</a>
            <a href="#!" class="next">></a> -->
        </div>
    </div>
    <ul id="filter-slide-out" class="sidenav filter-slide-out">
        <li>

        </li>
    </ul>
</div>
@endsection



@section('scripts')
<script src="{{ asset('public/assets/scripts/iphukien/user/list-product.js') }}"></script>
<script>
$(document).ready(function () {
    $('.filter-slide-out').sidenav();
    var elems = document.querySelectorAll('select');
    M.FormSelect.init(elems);
});
</script>
@endsection
