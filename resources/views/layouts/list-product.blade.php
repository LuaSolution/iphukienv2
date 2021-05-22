<div class="products-wrapper">
    <div class="row products">
        @foreach($listProduct as $product)
            <div class="product col m3 s6">
                <?php $img = (new \App\Product())->getProductDefaultImage($product->id);?>
                <div class="img img_product"
                    style="background-image: url({{ asset($img != null && $img->image != null ? 'public/' . $img->image : 'public/assets/images/header/logo.svg') }})">
                </div>
                <div class="name">
                    <a
                        href="{{ route('products.show', $product->slug ? $product->slug : $product->id) }}">
                        {{ $product->name }}
                    </a>
                </div>

                <div class="price">
                    @if($product->sale_price > 0)
                        <span
                            class="sale">{{ number_format($product->sale_price , 0, ',', '.') }}đ</span>
                        <br />
                        <span
                            class="origin">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                    @else
                        <span
                            class="sale">{{ number_format($product->price , 0, ',', '.') }}đ</span>
                    @endif
                </div>

                <div class="button-wrapper">
                    <a class="modal-trigger quickview-btn" href="#quickview"
                        data-url="{{ route('ajax.quickview-product', $product->id) }}"
                        data-token="{{ csrf_token() }}" data-imagepath="{{ asset('public/') }}"
                        data-productid="{{ $product->id }}"
                        data-getchildproducturl="{{ route('ajax.get-child-product') }}">
                        <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1 6C1 6 4.02395 1 9.31587 1C14.6078 1 17.6317 6 17.6317 6C17.6317 6 14.6078 11 9.31587 11C4.02395 11 1 6 1 6Z"
                                stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M9.31582 7.87506C10.5684 7.87506 11.5838 7.03559 11.5838 6.00006C11.5838 4.96453 10.5684 4.12506 9.31582 4.12506C8.06325 4.12506 7.04785 4.96453 7.04785 6.00006C7.04785 7.03559 8.06325 7.87506 9.31582 7.87506Z"
                                stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Xem nhanh</a>
                </div>
            </div>
        @endforeach

    </div>
</div>