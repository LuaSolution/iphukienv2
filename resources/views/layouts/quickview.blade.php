<!-- Modal Structure -->
<div id="quickview" class="modal">
    <div class="modal-content">
        <a href="#!" class="modal-close close-quickview"></a>
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
                <div class="sizes" id="quickview-colors"></div>
            </div>
            <div class="sizes-wrapper">
            <div class="color-label">Kích thước<a href="{{ url('huong-dan-chon-size') }}" target="_blank"  style="text-transform:none;font-weight:400">(Hướng dẫn chọn size)</a></div>
                <div class="sizes" id="quickview-sizes"></div>
            </div>
            <div class="pre-order-block">
                <div class="quantity-input">
                    <span class="decrease">-</span>
                    <input type="number" class="quantity" value="0" id="quantity" />
                    <span class="increase">+</span>
                </div>
                <a href="#!" class="add-to-card-btn">Thêm vào giỏ hàng</a>
                <a href="{{ route('user.cart') }}" class="buy-now-btn" style="width:180px" data-url="{{ route('user.cart') }}">Mua ngay</a>
            </div>
        </div>
    </div>
</div>
