<div class="products-wrapper">
    <div class="row products">
        @foreach($listProduct as $product)
        <div class="product col l3 {{$product->wishlist ? 'added-wishlist' : ''}}">
            <div class="img" style="background-image: url({{ $product->image }})"></div>
            <div class="name">
                <a href="{{ route('products.show', $product->id) }}">
                    {{$product->name}}
                </a>
            </div>
            <div class="price">
                <span class="sale">{{ number_format($product->sale_price , 0, ',', '.') }}đ</span>
                <span class="origin">{{ number_format($product->price, 0, ',', '.') }}đ</span>
            </div>
            <div class="button-wrapper">
                <a class="modal-trigger" href="#quickview">Xem nhanh</a>
            </div>
        </div>
        @endforeach
    </div>
    @if(@hasReadMore)
    <a href="#!" class="view-more">Xem thêm</a>
    @endif
</div>
<!-- Modal Structure -->
<div id="quickview" class="modal">
    <div class="modal-content">
        <a href="#!" class="modal-close close-quickview"><a>
        <div class="carousel carousel-slider quickview-slider">
            <a href="#!" class="previous"></a>
            <div class="carousel-item product-img added-wishlist">
                <span class="sale-percent" id="sale-percent">-50%</span>
                <img src="{{ asset('public/assets/images/demo/watch.png') }}" />
            </div>
            <div class="carousel-item product-img">
                <img src="{{ asset('public/assets/images/demo/watch.png') }}" />
            </div>
            <div class="carousel-item product-img">
                <img src="{{ asset('public/assets/images/demo/watch.png') }}" />
            </div>
            <div class="carousel-item product-img">
                <img src="{{ asset('public/assets/images/demo/watch.png') }}" />
            </div>
            <a href="#!" class="next"></a>
        </div>
        <div class="product-infos">
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
                    <span class="color">Xanh lá</span>
                    <span class="color">Xanh da trời</span>
                    <span class="color">Tím</span>
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
</div>

