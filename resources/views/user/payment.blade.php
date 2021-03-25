@extends('layouts.app')

@section('title', 'Thanh toán')

@section('header')
@include('layouts.header', ['status' => 'complete'])
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('public/iphukien/user/header.css') }}">
<link rel="stylesheet" href="{{ asset('public/iphukien/user/payment.css') }}">
<link rel="stylesheet" href="{{ asset('public/iphukien/user/footer.css') }}">
@endsection

@section('content')
<div class="ipk-container payment-container">
    <div class="ipk-content-container">
        <div class="order-infos">
            <div class="address-block-title">
                <span class="gio-hang">Giỏ hàng</span>
                <span class="thanh-toan">Thanh toán</span>
            </div>
            <div class="address-block">
                <div class="title">địa chỉ đã lưu</div>
                <div class="sub-title">Chọn địa chỉ để giao hàng tới</div>
                <div class="list-address">
                    <div class="address selected">
                        <div class="address-content">123 tên đường, tên phường, tỉnh thành</div>
                        <div class="customer-name">Tên khách hàng</div>
                        <div class="customer-phone">+84 000</div>
                        <div class="customer-email">email</div>
                    </div>
                    <div class="address">
                        <div class="address-content">123 tên đường, tên phường, tỉnh thành</div>
                        <div class="customer-name">Tên khách hàng</div>
                        <div class="customer-phone">+84 000</div>
                        <div class="customer-email">email</div>
                    </div>
                    <div class="address">
                        <div class="address-content">123 tên đường, tên phường, tỉnh thành</div>
                        <div class="customer-name">Tên khách hàng</div>
                        <div class="customer-phone">+84 000</div>
                        <div class="customer-email">email</div>
                    </div>
                </div>
                <div class="add-new-address modal-trigger" data-target="new-address-popup" href="#new-address-popup">
                    + Thêm địa chỉ khác
                </div>
            </div>
            <div class="payment-delivery-block">
                <div class="methods">
                    <div class="methods-title">Chọn hình thức thanh toán</div>
                    <div class="list-method">
                        <div class="method-item payment-method-item selected">Thanh toán tiền mặt khi nhận hàng</div>
                    </div>
                </div>
                <div class="methods">
                    <div class="methods-title">Chọn hình thức vận chuyển</div>
                    <div class="list-method">
                        <div class="method-item delivery-method-item">Giao nội tỉnh - Qua ngày</div>
                        <div class="method-item delivery-method-item">Giao nhanh Nội tỉnh VIP - 1 ngày</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="payment-infos">
            <div class="payment-infos-title">Chi tiết đơn hàng</div>
            <div class="info">
                <span>Số lượng sản phẩm</span>
                <span>5</span>
            </div>
            <div class="info">
                <span>Tiền hàng</span>
                <span>548.000 VND</span>
            </div>
            <div class="info">
                <span>Phí giao hàng</span>
                <span>50.000 VND</span>
            </div>
            <div class="info">
                <span>Dự kiến nhận hàng</span>
                <span>20-02-2020</span>
            </div>
            <div class="info sum">
                <span>Tổng cộng</span>
                <span>598.000 vND</span>
            </div>
        </div>
        <div class="list-button-wrapper">
            <div class="list-button">
                <a href="{{ url()->previous() }}" class="come-back">Quay trở lại</a>
                <a href="{{ route('user.payment-complete') }}" class="complete">Hoàn tất</a>
                <div class="sum">
                    <div class="sum-price">TỔNG 1.887.000 VNĐ</div>
                    <div class="count-products">Có x sản phẩm</div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Structure -->
<div id="new-address-popup" class="modal">
    <div class="modal-content">
        <div class="new-address-popup-title">
            Thêm địa chỉ mới
        </div>
        <form method="post" class="add-new-address-form">
            <div class="form-input">
                <input type="text" placeholder="HỌ VÀ TÊN *" />
                <span>Vui lòng điền đầy đủ Họ và Tên</span>
            </div>
            <div class="form-input">
                <input type="text" placeholder="SỐ ĐIỆN THOẠI *" />
                <span>Ví dụ: 0866 909 606</span>
            </div>
            <div class="form-input">
                <input type="text" placeholder="SỐ ĐIỆN THOẠI *" />
                <span>Ví dụ: 0866 909 606</span>
            </div>
            <div class="form-input">
                <div class="input-field">
                    <select name="city" id="city">
                        <option value="" disabled selected>Chọn tỉnh/ thành phố</option>
                        @foreach ($list_city as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-input">
                <div class="input-field">
                    <select name="district" id="district">
                        <option value="" disabled selected>Chọn quận/ huyện</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('footer')
@include('layouts.footer', ['status' => 'complete'])
@endsection

@section('scripts')
<script src="{{ asset('public/assets/scripts/iphukien/user/header.js') }}"></script>
<script src="{{ asset('public/assets/scripts/iphukien/user/payment.js') }}"></script>
<script>
$(document).on("change", "#city", function () {
    let cityId = $(this).val();
    $.get(
        "{{ URL::to('/') }}/location/DISTRICT/" + cityId,
        function (data) {
            console.log(data)
        }
    );
});
</script>
@endsection