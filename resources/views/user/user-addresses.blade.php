@extends('layouts.app')

@section('title', 'Địa chỉ của tôi')

@section('header')
@include('layouts.header', ['status' => 'complete'])
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/user-top.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/user-address.css') }}">
@endsection

@section('content')
<div class="ipk-container">
    <div class="ipk-content-container user-addresses-container">
        @include('layouts.user-top', ['status' => 1])
        <div class="user-addresses-txt">Địa chỉ của tôi</div>
        <div class="user-addresses-sub-txt">Chọn địa chỉ để giao hàng tới</div>
        <div class="add-new-address modal-trigger" data-target="new-address-popup" href="#new-address-popup">
            Thêm địa chỉ
        </div>
        <div class="list-address">
            @foreach($addresses as $add)
            <div class="address">
                <div class="address-content">{{$add->address}}</div>
                <div class="customer-name">{{$add->name}}</div>
                <div class="customer-phone">{{$add->phone}}</div>
                <div class="customer-email">{{$add->email}}</div>
                <div class="list-action">
                    <a href="#!" class="set-default">Mặc định</a>
                    <a href="#!">Sửa</a>
                    <a href="#!">Xóa</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
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
                <input type="text" placeholder="EMAIL *" />
                <span>Ví dụ: 0866 909 606</span>
            </div>
            <div class="col m6 s12 form-input">
                <div class="input-field">
                    <select name="city" id="city">
                        <option value="" disabled selected>Chọn tỉnh/ thành phố</option>
                        @foreach ($list_city as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col m6 s12 form-input">
                <div class="input-field">
                    <select name="district" id="district">
                        <option value="" disabled selected>Chọn quận/ huyện</option>
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
                <button type="submit" value="Thêm địa chỉ">Thêm địa chỉ</button>
            </div>
        </form>
    </div>
</div>
@endsection



@section('scripts')
<script src="{{ asset('public/assets/scripts/iphukien/user/user-top.js') }}"></script>
<script>
$(document).ready(function () {
    var elems = document.querySelectorAll('#new-address-popup');
    M.Modal.init(elems, {"endingTop": '5%'});
    var elems = document.querySelectorAll('select');
    M.FormSelect.init(elems);
});
$(document).on("click", ".address", function () {
    $('.address').removeClass('selected');
    $(this).addClass('selected');
});
</script>
@endsection
