<div class="products-wrapper">
    <div class="row products">
        @foreach($listProduct as $product)
            <div
                class="product col l3 {{ $product->wishlist ? 'added-wishlist' : '' }}">
                <?php $img = \App\ProductColor::where('product_id', $product->id)->first();?>
                <div class="img"
                    style="background-image: url({{ asset($img ? 'public/' . $img->image : 'public/assets/images/demo/watch.png') }})">
                </div>
                <div class="name">
                    <a href="{{ route('products.show', $product->id) }}">
                        {{ $product->name }}
                    </a>
                </div>
                <div class="price">
                    <span
                        class="sale">{{ number_format($product->sale_price , 0, ',', '.') }}đ</span>
                    <span
                        class="origin">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                </div>
                <div class="button-wrapper">
                    <a class="modal-trigger quickview-btn" href="#quickview" 
                        data-url="{{ route('ajax.quickview-product', $product->id) }}" 
                        data-token="{{ csrf_token() }}"
                        data-imagepath="{{ asset('public/') }}"
                        data-productid="{{ $product->id }}"
                    >Xem nhanh</a>
                </div>
            </div>
        @endforeach

    </div>
</div>
<!-- Modal Structure -->
<div id="quickview" class="modal">
    <div class="modal-content">
        <a href="#!" class="modal-close close-quickview"><a>
                <div class="carousel carousel-slider quickview-slider" id="slider-image">
                    
                </div>
                <div class="product-infos">
                    <div class="name" id="quickview-name"></div>
                    <div class="description" id="quickview-short-description"></div>
                    <div class="list-tags" id="quickview-list-tag">
                    </div>
                    <div class="price">
                        <div class="origin" id="quickview-origin"></div>
                        <div class="sale" id="quickview-sale"></div>
                    </div>
                    <div class="status-wrapper">
                        <div class="status-label">Tình trạng</div>
                        <div class="list-status" id="quickview-status"></div>
                    </div>
                    <div class="colors-wrapper">
                        <div class="color-label">Màu sắc</div>
                        <div class="colors" id="quickview-colors"></div>
                    </div>
                    <div class="sizes-wrapper">
                        <div class="size-label">Kích thước<a href="#!" target="_blank">(Hướng dẫn chọn size)</a></div>
                        <div class="sizes" id="quickview-sizes"></div>
                    </div>
                    <div class="pre-order-block">
                        <div class="quantity-input">
                            <span class="decrease">-</span>
                            <input type="number" class="quantity" value="0" id="quantity" />
                            <span class="increase">+</span>
                        </div>
                        <a href="#!" class="add-to-card-btn">Thêm vào giỏ hàng</a>
                        <a href="{{ route('user.cart') }}" class="buy-now-btn" data-url="{{ route('user.cart') }}">Mua ngay</a>
                    </div>
                </div>
    </div>
</div>
