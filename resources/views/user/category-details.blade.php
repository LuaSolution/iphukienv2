@extends('layouts.app')

@section('title',  $category->title)

@section('header')
    @include('layouts.header', ['status' => 'complete'])
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/ipk-breadcrumb.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/category-details.css') }}">
    <link rel="stylesheet" href="{{ asset('public/iphukien/user/list-product.css') }}">
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
                    <option value="az">Tên: A-Z</option>
                    <option value="za">Tên: Z-A</option>
                    <option value="pasc">Giá: Thấp - Cao</option>
                    <option value="pdesc">Giá: Cao - Thấp</option>
                </select>
            </div>
        </div>
        <div class="ipk-content-container">
            <div id="content">
                @include('layouts.list-product')
            </div>

            <div id="paginate_custom" class="pagination_custom">
                {{ $listProduct->appends(request()->input())->links() }}
            </div>
        </div>
        <ul id="filter-slide-out" class="sidenav filter-slide-out">
            <li class="filter-header">Trạng thái</li>
            <li class="filter-checkbox">
                @foreach($tags as $c)
                <div class="filter-checkbox-block">
                    <label>
                        <input type="checkbox" name="tags" value="{{$c->id}}" class="filled-in"/>
                        <span>{{$c->name}}</span>
                    </label>
                </div>
                @endforeach
            </li>
            <li class="filter-header">Màu sắc</li>
            <li class="filter-checkbox">
                @foreach($colors as $c)
                    <div class="filter-checkbox-block">
                        <label>
                            <input type="checkbox" name="colors" value="{{$c->id}}" class="filled-in"/>
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
                            <input type="checkbox" name="sizes" value="{{$c->id}}" class="filled-in"/>
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
                            <input type="checkbox" name="trademarks" value="{{$c->id}}" class="filled-in"/>
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
    <div id="loading">
        <div class="lds-roller">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('public/assets/scripts/iphukien/user/list-product.js') }}"></script>
    <script src="https://materializecss.com/extras/noUiSlider/nouislider.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/0.10.0/lodash.min.js"></script>
    <script>
        $(document).ready(function () {
            let count_price = 0 ;

            $('.filter-slide-out').sidenav();
            var elems = document.querySelectorAll('select');
            M.FormSelect.init(elems);

            var slider = document.getElementById('price-range');
            noUiSlider.create(slider, {
                start: [0, 10000000],
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

            slider.noUiSlider.on('update', _.debounce(function (values, handle) {
                document.getElementById("min_price").innerHTML = new Intl.NumberFormat('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                }).format(values[0]);
                document.getElementById("max_price").innerHTML = new Intl.NumberFormat('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                }).format(values[1]);

                prices = [];
                prices.push(values[0], values[1]);

                count_price++;
                if(count_price !== 1) {
                    searchAjax();
                }
            }, 1000));
        });

        function sorting() {
            var x = document.getElementById("mySelect").value;
            console.log(x)
            location.href = "?sort=" + x
        }

        let tags = [];
        let colors = [];
        let sizes = [];
        let trademarks = [];
        let prices = [];

        $('input[name="tags"]').on('change', function (e) {
            if ($(this).is(':checked')) {
                tags.push(e.target.value);
            } else {
                tags.splice(tags.indexOf(e.target.value), 1);
            }

            searchAjax();
        })

        $('input[name="colors"]').on('change', function (e) {
            if ($(this).is(':checked')) {
                colors.push(e.target.value);
            } else {
                colors.splice(colors.indexOf(e.target.value), 1);
            }

            searchAjax();
        })

        $('input[name="sizes"]').on('change', function (e) {
            if ($(this).is(':checked')) {
                sizes.push(e.target.value);
            } else {
                sizes.splice(sizes.indexOf(e.target.value), 1);
            }
            searchAjax();
        })

        $('input[name="trademarks"]').on('change', function (e) {
            if ($(this).is(':checked')) {
                trademarks.push(e.target.value);
            } else {
                trademarks.splice(trademarks.indexOf(e.target.value), 1);
            }
            searchAjax();
        })

        function searchAjax(page = 1) {
            const id = {{ $id }};

            $.ajax({
                // Khi day len matet thi xoa cai iphukienv2 r^^a
                url: `/iphukienv2/search/categories/${id}?page=${page}&tags=[${tags}]&colors=[${colors}]&sizes=[${sizes}]&trademarks=[${trademarks}]&prices=[${prices}]`,
                method: 'get',
                dataType: 'JSON',
                beforeSend: function () {
                    document.getElementById("loading").style.display = "flex";
                },
                complete: function () {
                    document.getElementById("loading").style.display = "none";
                },
                success: function (data) {
                    $("#content").html(data.view);

                    $('#paginate_custom').empty();
                    for (var i = 1; i <= data.total_page; i++) {
                        $("#paginate_custom").append(`<a href="javascript:void(0)" onclick="searchAjax(${i})" class="${i === data.currentPage ? 'active' : ''}" href="#">${i}</a>`);
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                }
            });
        }
    </script>
@endsection
