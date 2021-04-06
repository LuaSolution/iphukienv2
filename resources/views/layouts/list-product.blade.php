<div class="products-wrapper">
    <div class="row products">
        @foreach($listProduct as $product)
        <div class="product col l3 {{ $product->wishlist ? 'added-wishlist' : '' }}">
            <?php $img = \App\ProductColor::where('product_id', $product->id)->first();?>
            <div class="img"
                style="background-image: url({{ asset($img ? 'public/' . $img->image : 'public/assets/images/demo/watch.png') }})">
            </div>
            <div class="name">
                <a href="{{ route('products.show', $product->slug ? $product->slug : $product->id) }}">
                    {{ $product->name }}
                </a>
            </div>
            <div class="price">
                <span class="sale">{{ number_format($product->sale_price , 0, ',', '.') }}đ</span>
                <span class="origin">{{ number_format($product->price, 0, ',', '.') }}đ</span>
            </div>
            <div class="button-wrapper">
                <a class="modal-trigger quickview-btn" href="#quickview"
                    data-url="{{ route('ajax.quickview-product', $product->id) }}" data-token="{{ csrf_token() }}"
                    data-imagepath="{{ asset('public/') }}" data-productid="{{ $product->id }}">Xem nhanh</a>
            </div>
        </div>
        @endforeach

    </div>
</div>