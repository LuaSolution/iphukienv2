@extends('layouts.app')

@section('title', 'Thanh toán')

@section('header')
@include('layouts.header', ['status' => 'complete'])
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/payment.css') }}">
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
                    @foreach($addresses as $key => $item)
                    <div class="address {{$item->is_default == 1 ? 'selected' : ''}}" data-addressid="{{item->id}}">
                        <div class="address-content">{{$item->address}}</div>
                        <div class="customer-name">{{$item->name}}</div>
                        <div class="customer-phone">{{$item->phone}}</div>
                        <div class="customer-email">{{$item->email}}</div>
                    </div>
                    @endforeach
                </div>
                <div class="add-new-address modal-trigger" data-target="new-address-popup" href="#new-address-popup">
                    + Thêm địa chỉ khác
                </div>
            </div>
            <div class="payment-delivery-block">
                <div class="methods">
                    <div class="methods-title">Chọn hình thức thanh toán</div>
                    <div class="list-method">
                        @foreach($paymentMethods as $key => $item)
                        <div class="method-item payment-method-item  {{$key == 0 ? 'selected' : ''}}" data-paymentmethod="{{$item->id}]">{{$item->name}}</div>
                        @endforeach
                    </div>
                </div>
                <div class="methods">
                    <div class="methods-title">Chọn hình thức vận chuyển</div>
                    <div class="list-method">
                        @foreach($deliveries as $key => $item)
                        <div class="method-item delivery-method-item {{$key == 0 ? 'selected' : ''}}" data-deliveryid="{{$item->id}]">{{$item->name }}</div>
                        @endforeach
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
        <a href="#!" class="modal-close close-add-address-popup"><a>
        <div class="new-address-popup-title">
            Thêm địa chỉ mới
        </div>
        <form method="post" class="row add-new-address-form">
            <div class="col m6 s12 form-input">
                <input type="text" placeholder="HỌ VÀ TÊN *" />
                <span>Vui lòng điền đầy đủ Họ và Tên</span>
            </div>
            <div class="col m6 s12 form-input">
                <input type="text" placeholder="SỐ ĐIỆN THOẠI *" />
                <span>Ví dụ: 0866 909 606</span>
            </div>
            <div class="col m6 s12 form-input">
                <input type="text" placeholder="SỐ ĐIỆN THOẠI *" />
                <span>Ví dụ: 0866 909 606</span>
            </div>
            <div class="col m6 s12 form-input">
                <div class="input-field">
                    <select name="city" id="city">
                        <option value="" disabled selected>Chọn tỉnh/ thành phố</option>
                        {{--  @foreach ($list_city as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach --}}
                        <option value="1">Hà Nội</option>
                        <option value="2">TP.HCM</option>
                    </select>
                </div>
            </div>
            <div class="col m6 s12 form-input">
                <div class="input-field">
                    <select name="district" id="district">
                        <option value="" disabled selected>Chọn quận/ huyện</option>
                        <option value="1">Quận 1</option>
                    </select>
                </div>
            </div>
            <div class="col m6 s12 form-input">
                <div class="input-field">
                    <select name="district" id="district">
                        <option value="" disabled selected>Chọn phường/ xã</option>
                    </select>
                </div>
            </div>
            <div class="col m6 s12 form-input">
                <input type="text" placeholder="SỐ NHÀ/ TÊN ĐƯỜNG *" />
                <span>Ví dụ: 86-88 đường Đinh Tiên Hoàng</span>
            </div>
            <div class="col s12 form-input">
                <div class="set-default-address">
                    <p>
                        <label>
                            <input type="checkbox" name="default-address" />
                            <span>Đặt làm địa chỉ mặc định</span>
                        </label>
                    </p>
                </div>
            </div>
            <div class="col s12 form-input center-align">
                <button type="submit" value="Cập nhật">Cập nhật</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('footer')
@include('layouts.footer', ['status' => 'complete'])
@endsection

@section('scripts')
<script src="{{ asset('public/assets/scripts/iphukien/user/payment.js') }}"></script>
<script>
$(document).on("change", "#city", function () {
    let cityId = $(this).val();
    // $.get(
    //     "{{ URL::to('/') }}/location/DISTRICT/" + cityId,
    //     function (data) {
    //         console.log(data)
    //     }
    // );
});
</script>
@endsection