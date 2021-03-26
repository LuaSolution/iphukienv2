@extends('layouts.app')

@section('title', 'Tên của sản phẩm')

@section('header')
@include('layouts.header', ['status' => 'complete'])
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/ipk-breadcrumb.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/product-details.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/list-product.css') }}">
@endsection

@section('fb-meta-tags')
<meta property="og:url" content="{{ url()->full() }}" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Tên của sản phẩm" />
<meta property="og:description" content="Tên của sản phẩm" />
<meta property="og:image" content="{{ asset('public/assets/images/demo/watch.png') }}" />
@endsection

@section('fb-sdk')
<div id="fb-root"></div>
<script>
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
@endsection

@section('content')
<div class="ipk-container product-breadcrumbs">
    <div class="ipk-content-container">
        <nav>
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="{{ route('getHome') }}" class="breadcrumb">Trang chủ</a>
                    <a href="{{ route('categories.show', ['id' => 1]) }}" class="breadcrumb">Danh mục sản phẩm</a>
                    <a href="javascript:void(0)" class="breadcrumb">Trang chi tiết hiện tại</a>
                </div>
            </div>
        </nav>
    </div>
</div>
<div class="ipk-container product-container">
    <div class="row ipk-content-container">
        <div class="col l1 list-thumb-wrapper">
            <div class="img-block">
                <a href="#!" class="up"></a>
                <div class="thumbs-wrapper">
                    <div class="thumbs">
                        <span style="background-image: url({{ asset('public/assets/images/demo/watch_thumb_1.png') }})"
                            data-img="{{ asset('public/assets/images/demo/watch_thumb_1.png') }}"></span>
                        <span style="background-image: url({{ asset('public/assets/images/demo/watch_thumb_3.png') }})"
                            data-img="{{ asset('public/assets/images/demo/watch_thumb_3.png') }}"></span>
                        <span style="background-image: url({{ asset('public/assets/images/demo/watch_thumb_2.png') }})"
                            data-img="{{ asset('public/assets/images/demo/watch_thumb_2.png') }}"></span>
                        <span style="background-image: url({{ asset('public/assets/images/demo/watch_thumb_4.png') }})"
                            data-img="{{ asset('public/assets/images/demo/watch_thumb_4.png') }}"></span>
                        <span style="background-image: url({{ asset('public/assets/images/demo/watch_thumb_5.png') }})"
                            data-img="{{ asset('public/assets/images/demo/watch_thumb_5.png') }}"></span>
                        <span style="background-image: url({{ asset('public/assets/images/demo/watch_thumb_1.png') }})"
                            data-img="{{ asset('public/assets/images/demo/watch_thumb_1.png') }}"></span>
                        <span style="background-image: url({{ asset('public/assets/images/demo/watch_thumb_2.png') }})"
                            data-img="{{ asset('public/assets/images/demo/watch_thumb_2.png') }}"></span>
                        <span style="background-image: url({{ asset('public/assets/images/demo/watch_thumb_3.png') }})"
                            data-img="{{ asset('public/assets/images/demo/watch_thumb_3.png') }}"></span>
                        <span style="background-image: url({{ asset('public/assets/images/demo/watch_thumb_4.png') }})"
                            data-img="{{ asset('public/assets/images/demo/watch_thumb_4.png') }}"></span>
                    </div>
                </div>
                <a href="#!" class="down"></a>
            </div>
            <div class="video-icon">
                <a href="#!"></a>
            </div>
        </div>
        <div class="col l6 main-image-wrapper">
            <span class="full-screen-btn modal-trigger" href="#list-image-popup"></span>
            <div class="main-image" style="background-image: url({{ asset('public/assets/images/demo/watch.png') }})"></div>
        </div>
        <div class="col l5 product-infos">
            <div class="name">Tên của sản phẩm này là</div>
            <div class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mi dignissim
                euismod
                lectus fermentum mollis lorem nec aliquam urna. Id fames vestibulum quis nam pharetra, id magna
                nibh
                cras. At fames id arcu elit tristique commodo eu, integer eget. Varius purus, tortor euismod
                dolor in.
                Sagittis, vulputate consectetur pellentesque quis facilisis accumsan</div>
            <div class="list-tags">
                <span class="tag hang-moi"></span>
                <span class="tag ban-chay"></span>
                <span class="tag giam-gia"></span>
            </div>
            <div class="price">
                <div class="origin">36.400.000đ</div>
                <div class="sale">18.200.000đ <span>Giảm 50%</span></div>
            </div>
            <div class="status-wrapper">
                <div class="status-label">Tình trạng</div>
                <div class="list-status">
                    <span class="status het-hang"></span>
                    <span class="status dat-truoc"></span>
                    <span class="status con-hang"></span>
                </div>
            </div>
            <div class="colors-wrapper">
                <div class="color-label">Màu sắc</div>
                <div class="colors">
                    <span class="color" data-img="{{ asset('public/assets/images/demo/watch_thumb_1.png') }}">Xanh lá</span>
                    <span class="color" data-img="{{ asset('public/assets/images/demo/watch_thumb_2.png') }}">Xanh da trời</span>
                    <span class="color" data-img="{{ asset('public/assets/images/demo/watch_thumb_3.png') }}">Tím</span>
                </div>
            </div>
            <div class="sizes-wrapper">
                <div class="size-label">Kích thước<a href="#!" target="_blank">(Hướng dẫn chọn size)</a></div>
                <div class="sizes">
                    <span class="size">XS</span>
                    <span class="size">S</span>
                    <span class="size">M</span>
                    <span class="size">L</span>
                    <span class="size">XL</span>
                </div>
            </div>
            <div class="pre-order-block">
                <div class="quantity-input">
                    <span class="decrease">-</span>
                    <input type="number" class="quantity" value="0" />
                    <span class="increase">+</span>
                </div>
                <a href="#!" class="add-to-card-btn">Thêm vào giỏ hàng</a>
                <a href="{{ route('user.cart') }}" class="buy-now-btn">Mua ngay</a>
            </div>
        </div>
    </div>
    <div class="product-rating ipk-content-container">
        <div class="fb-share-button" data-href="{{ url()->full() }}" data-layout="button_count"></div>
        <div class="add-wishlist-button">Thêm vào yêu thích</div>
    </div>
    <div class="product-descriptions ipk-content-container">
        <div class="title">Mô tả sản phẩm</div>
        <div class="content">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Id eu arcu dolor rhoncus velit. Id commodo, blandit
            tincidunt elementum cras convallis. Dis cursus eget tempus et, elit lectus quis purus iaculis. Pulvinar
            nunc, proin vestibulum aliquet leo elementum et ultrices aliquam. Vehicula quam elit elit at potenti etiam
            sem tincidunt cursus. Erat amet nunc risus purus, velit in. Dictum tristique mus montes, urna orci, at.
            Risus, egestas morbi nulla vulputate lacus enim, elit nec.
            Vel mi feugiat enim cum lacus enim, ullamcorper augue lacus. Bibendum eros tristique id aenean est orci,
            pretium pharetra, diam. Dignissim morbi quis quis sit nec non nisl. Cursus in malesuada mauris, tristique.
            Orci nunc eget leo pretium. Egestas proin mattis sodales praesent nisl aliquet nulla vestibulum. Posuere at
            duis facilisis malesuada at semper. Est enim pellentesque egestas in aliquam velit risus. Augue congue
            aliquet lobortis amet, dignissim. Vel nulla pretium vel senectus sed sagittis. Est eu sed posuere sed arcu
            egestas pulvinar adipiscing eget.
            <img src="{{ asset('public/assets/images/demo/content_image.png') }}" />
            Risus eget vitae ultrices amet cras. Suspendisse dolor ultrices vitae donec amet. Egestas sit vitae, aenean
            risus eros in aliquam. Volutpat lectus nisi ut id vitae. Dui, a, tincidunt pulvinar viverra quisque
            venenatis nunc, metus. Duis velit nascetur nibh ultricies malesuada massa lectus id ut. Pulvinar in mauris,
            ornare pharetra adipiscing. Imperdiet nunc cursus iaculis tempus, dolor. Elit eget eros, ac dictum cursus.
            Sed eu, velit eget gravida a leo. Sed tincidunt varius aliquam vel sed purus pretium massa. Id quisque
            nullam non non pellentesque. Rhoncus sed luctus etiam leo vitae nullam fermentum.
            Cras sociis tellus magna pharetra, est, ut risus, vivamus quis. Sed lorem vel nascetur etiam risus aliquam
            cras bibendum facilisis. Egestas dolor consectetur semper scelerisque ullamcorper nunc eget. Eu integer id
            ut leo scelerisque risus massa purus duis. Integer cursus hendrerit pellentesque volutpat nibh mollis quam
            arcu non. Tempor nunc ornare mi ornare eu. Sit turpis scelerisque mattis commodo diam facilisis. Nascetur
            arcu eget ridiculus parturient neque pharetra mi. Lectus nunc fringilla eleifend convallis ultrices purus
            lectus. Metus dolor in accumsan venenatis, morbi mauris vivamus scelerisque eget. Enim massa ligula leo
            viverra maecenas morbi adipiscing sit porttitor. Leo turpis morbi elementum hac rhoncus, elit nunc sit ut.
            Malesuada diam, amet neque, adipiscing ullamcorper tempor sit. Sit eget et nisi, fermentum fringilla diam
            sagittis, enim porta. Risus, scelerisque egestas pharetra est. Morbi dolor at phasellus bibendum purus.
            Vulputate lobortis eget enim, vitae auctor accumsan nibh. Tellus, faucibus vitae sodales lacinia enim mauris
            lorem habitant blandit. Mus fames lectus volutpat, vulputate et aliquam nisl arcu etiam. Turpis iaculis
            integer est posuere amet, a. Sit at ultrices vel, augue. Lobortis purus pulvinar cum nunc blandit eget eu
            vulputate.
        </div>
    </div>
    <div class="same-products-block ipk-content-container">
        <p class="block-title">Sản phẩm tương tự</p>
        @include('layouts.list-product', ['fromPage' => 'product-details'])
    </div>
</div>
<!-- Modal Structure -->
<div id="list-image-popup" class="modal">
    <div class="modal-content">
        <a href="#!" class="modal-close close-list-image-popup"></a>
        <div class="main-image-popup" style="background-image: url({{ asset('public/assets/images/demo/watch.png') }})"></div>
        <div class="list-thumbs-popup">
            <div class="img-block-popup">
                <a href="#!" class="arrow-left"></a>
                <div class="thumbs-wrapper-popup">
                    <div class="thumbs-popup">
                        <span style="background-image: url({{ asset('public/assets/images/demo/watch_thumb_1.png') }})"
                            data-img="{{ asset('public/assets/images/demo/watch_thumb_1.png') }}"></span>
                        <span style="background-image: url({{ asset('public/assets/images/demo/watch_thumb_2.png') }})"
                            data-img="{{ asset('public/assets/images/demo/watch_thumb_2.png') }}"></span>
                        <span style="background-image: url({{ asset('public/assets/images/demo/watch_thumb_3.png') }})"
                            data-img="{{ asset('public/assets/images/demo/watch_thumb_3.png') }}"></span>
                        <span style="background-image: url({{ asset('public/assets/images/demo/watch_thumb_4.png') }})"
                            data-img="{{ asset('public/assets/images/demo/watch_thumb_4.png') }}"></span>
                        <span style="background-image: url({{ asset('public/assets/images/demo/watch_thumb_5.png') }})"
                            data-img="{{ asset('public/assets/images/demo/watch_thumb_5.png') }}"></span>
                        <span style="background-image: url({{ asset('public/assets/images/demo/watch_thumb_1.png') }})"
                            data-img="{{ asset('public/assets/images/demo/watch_thumb_1.png') }}"></span>
                        <span style="background-image: url({{ asset('public/assets/images/demo/watch_thumb_2.png') }})"
                            data-img="{{ asset('public/assets/images/demo/watch_thumb_2.png') }}"></span>
                        <span style="background-image: url({{ asset('public/assets/images/demo/watch_thumb_3.png') }})"
                            data-img="{{ asset('public/assets/images/demo/watch_thumb_3.png') }}"></span>
                        <span style="background-image: url({{ asset('public/assets/images/demo/watch_thumb_4.png') }})"
                            data-img="{{ asset('public/assets/images/demo/watch_thumb_4.png') }}"></span>
                        <span style="background-image: url({{ asset('public/assets/images/demo/watch_thumb_1.png') }})"
                            data-img="{{ asset('public/assets/images/demo/watch_thumb_1.png') }}"></span>
                        <span style="background-image: url({{ asset('public/assets/images/demo/watch_thumb_2.png') }})"
                            data-img="{{ asset('public/assets/images/demo/watch_thumb_2.png') }}"></span>
                        <span style="background-image: url({{ asset('public/assets/images/demo/watch_thumb_3.png') }})"
                            data-img="{{ asset('public/assets/images/demo/watch_thumb_3.png') }}"></span>
                        <span style="background-image: url({{ asset('public/assets/images/demo/watch_thumb_4.png') }})"
                            data-img="{{ asset('public/assets/images/demo/watch_thumb_4.png') }}"></span>
                        <span style="background-image: url({{ asset('public/assets/images/demo/watch_thumb_5.png') }})"
                            data-img="{{ asset('public/assets/images/demo/watch_thumb_5.png') }}"></span>
                        <span style="background-image: url({{ asset('public/assets/images/demo/watch_thumb_1.png') }})"
                            data-img="{{ asset('public/assets/images/demo/watch_thumb_1.png') }}"></span>
                        <span style="background-image: url({{ asset('public/assets/images/demo/watch_thumb_2.png') }})"
                            data-img="{{ asset('public/assets/images/demo/watch_thumb_2.png') }}"></span>
                        <span style="background-image: url({{ asset('public/assets/images/demo/watch_thumb_3.png') }})"
                            data-img="{{ asset('public/assets/images/demo/watch_thumb_3.png') }}"></span>
                        <span style="background-image: url({{ asset('public/assets/images/demo/watch_thumb_4.png') }})"
                            data-img="{{ asset('public/assets/images/demo/watch_thumb_4.png') }}"></span>
                    </div>
                </div>
                <a href="#!" class="arrow-right"></a>
            </div>
            <div class="video-icon-popup">
                <a href="#!"></a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
@include('layouts.footer', ['status' => 'complete'])
@endsection

@section('scripts')
<script src="{{ asset('public/assets/scripts/iphukien/user/product-details.js') }}"></script>
<script src="{{ asset('public/assets/scripts/iphukien/user/list-product.js') }}"></script>
@endsection