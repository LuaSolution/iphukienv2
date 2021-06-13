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
                    <a href="{{ route('user.set-default-address', $add->id) }}" class="set-default">Mặc định</a>
                    <a href="{{ route('user.delete-address', $add->id) }}">Xóa</a>
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
        <form method="post" action="{{route('user.add-new-address')}}" class="row add-new-address-form">
            {{ csrf_field() }}
            <div class="col m6 s12 form-input">
                <input type="text" placeholder="HỌ VÀ TÊN *" name="name" />
                <span>Vui lòng điền đầy đủ Họ và Tên</span>
            </div>
            <div class="col m6 s12 form-input">
                <input type="text" placeholder="SỐ ĐIỆN THOẠI *" name="phone" />
                <span>Ví dụ: 0866 909 606</span>
            </div>
            <div class="col m6 s12 form-input">
                <input type="text" placeholder="EMAIL *" name="email"/>
                <span>Ví dụ: 0866 909 606</span>
            </div>
            <div class="col m6 s12 form-input">
                <div class="input-field">
                    <select name="city" id="city" name="city"  data-native-menu="false">
                        <option disabled selected>Chọn tỉnh/ thành phố</option>
                        @foreach ($list_city as $city)
                        <option value="{{ $city->name }}" data-cityid="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                        <optgroup disabled></optgroup>
                    </select>
                </div>
            </div>
            <div class="col m6 s12 form-input">
                <div class="input-field">
                    <select name="district" id="district" name="district"  data-native-menu="false">
                        <option value="" disabled selected>Chọn quận/ huyện</option>
                    </select>
                </div>
            </div>
            <div class="col m6 s12 form-input">
                <div class="input-field">
                    <select name="ward" id="ward" name="ward"  data-native-menu="false">
                        <option value="" disabled selected>Chọn phường/ xã</option>
                    </select>
                </div>
            </div>
            <div class="col m6 s12 form-input">
                <input type="text" placeholder="SỐ NHÀ/ TÊN ĐƯỜNG *" name="address" />
                <span>Ví dụ: 86-88 đường Đinh Tiên Hoàng</span>
            </div>
            <div class="col s12 form-input">
                <div class="set-default-address">
                    <p>
                        <label>
                            <input type="checkbox" name="default-address" name="is_default" />
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
$(document).on("change", "#city", function () {
    $(".ipk-preloader").removeClass('hide');
    let cityId = $("#city option:selected").data('cityid');
    console.log(cityId)
    $("#district option").remove();
    $.get(
        "{{ URL::to('/') }}/location/DISTRICT/" + cityId,
        function (data) {
            let districts = JSON.parse(data);
            let dis;
            $("#district").formSelect().append('<option value="" disabled selected>Chọn quận/ huyện</option>');
            do {
                dis = districts.pop();
                $("#district").formSelect().append('<option value="' + dis.name + '" data-districtid="' + dis.id + '">' + dis.name + '</option>');
            }
            while (districts.length > 0);
            $("#district").formSelect();
            $(".ipk-preloader").addClass('hide');
        }
    );

});
$(document).on("change", "#district", function () {
    $(".ipk-preloader").removeClass('hide');
    let districtId = $("#district option:selected").data('districtid');
    $("#ward option").remove();
    $.get(
        "{{ URL::to('/') }}/location/WARD/" + districtId,
        function (data) {
            console.log(data)
            let wards = JSON.parse(data);
            let ward;
            $("#ward").formSelect().append('<option value="" disabled selected>Chọn phường/ xã</option>');
            do {
                ward = wards.pop();
                $("#ward").formSelect().append('<option value="' + ward.name + '" data-wardid="' + ward.id + '">' + ward.name + '</option>');
            }
            while (wards.length > 0);
            $("#ward").formSelect();
            $(".ipk-preloader").addClass('hide');
        }
    );
});
</script>
@endsection
