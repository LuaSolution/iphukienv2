@extends('layouts.app')

@section('title', 'Tên danh mục sản phẩm')

@section('header')
@include('layouts.header', ['status' => 'complete'])
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/ipk-breadcrumb.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/category-details.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/list-product.css') }}">
<link rel="stylesheet" href="https://materializecss.com/extras/noUiSlider/nouislider.css">
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
            <select id="mySelect" onchange="sorting()">
                <option value="" disabled selected>Sắp xếp</option>
                <option value="az">Tên: A-Z</a></option>
                <option value="za">Tên: Z-A</option>
                <option value="pasc">Giá: Thấp - Cao</option>
                <option value="pdesc">Giá: Cao - Thấp</option>
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
        <li class="filter-header">Trạng thái</li>
        <li class="filter-checkbox">
            <div class="filter-checkbox-block">
                <label>
                    <input type="checkbox" class="filled-in" />
                    <span>Hàng mới</span>
                </label>
            </div>
            <div class="filter-checkbox-block">
                <label>
                    <input type="checkbox" class="filled-in" />
                    <span>Bán chạy</span>
                </label>

            </div>
            <div class="filter-checkbox-block">
                <label>
                    <input type="checkbox" class="filled-in" />
                    <span>Giảm giá</span>
                </label>
            </div>
        </li>
        <li class="filter-header">Màu sắc</li>
        <li class="filter-checkbox">
            @foreach($colors as $c)
            <div class="filter-checkbox-block">
                <label>
                    <input type="checkbox" class="filled-in" />
                    <span>{{$c->name}}</span>
                </label>
            </div>
            @endforeach
        </li>
        <li class="filter-header">Kích cỡ</li>
        <li class="filter-checkbox">
            @foreach($sizes as $c)
            <div class="filter-checkbox-block">
                <label>
                    <input type="checkbox" class="filled-in" />
                    <span>{{$c->name}}</span>
                </label>
            </div>
            @endforeach
        </li>
        <li class="filter-header">Thương hiệu</li>
        <li class="filter-checkbox">
            @foreach($trademarks as $c)
            <div class="filter-checkbox-block">
                <label>
                    <input type="checkbox" class="filled-in" />
                    <span>{{$c->name}}</span>
                </label>
            </div>
            @endforeach
        </li>
        <li class="filter-header">Mức giá</li>
        <li class="filter-checkbox">

            <div class="price-range"> 
                <label for="min_price" id="min_price"></label>
                <label for="max_price" id="max_price"></label>
            </div>
            <div id="price-range"></div>
        </li>
    </ul>
    @include('layouts.quickview')
</div>
@endsection



@section('scripts')
<script src="{{ asset('public/assets/scripts/iphukien/user/list-product.js') }}"></script>
<script src="https://materializecss.com/extras/noUiSlider/nouislider.js"></script>
<script>
$(document).ready(function() {
    $('.filter-slide-out').sidenav();
    var elems = document.querySelectorAll('select');
    M.FormSelect.init(elems);

    var slider = document.getElementById('price-range');
    noUiSlider.create(slider, {
        start: [200000, 10000000],
        connect: true,
        step: 1,
        orientation: 'horizontal', // 'horizontal' or 'vertical'
        range: {
            'min': 0,
            'max': 10000000
        },
        format: wNumb({
            decimals: 0
        })
    });

    slider.noUiSlider.on('update', function( values, handle ) {
        document.getElementById("min_price").innerHTML = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(values[0]);
        document.getElementById("max_price").innerHTML = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(values[1]);
    });
});

function sorting() {
    var x = document.getElementById("mySelect").value;
    console.log(x)
    location.href = "?sort=" + x
}
</script>
@endsection
