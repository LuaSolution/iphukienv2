@extends('layouts.app')

@section('title', 'Thông tin tài khoản')

@section('header')
@include('layouts.header', ['status' => 'complete'])
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/user-top.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/user-information.css') }}">
@endsection

@section('content')
<div class="ipk-container">
    <div class="ipk-content-container user-information-container">
        @include('layouts.user-top', ['status' => 1])
        <div class="update-infos-txt">CẬP NHẬT TÀI KHOẢN</div>
        <form method="post" id="user-information-form" enctype="multipart/form-data">
            <div class="user-avatar">
                <div class="caption">Ảnh đại diện</div>
                <div class="upload-group">
                    <input type="file" name="avatar" id="avatar" class="hide" />
                    <div class="current-avatar" id="current-avatar" style="background-image: url({{ asset('public/assets/images/demo/avatar.jpg') }})"></div>
                </div>
            </div>
            <div class="info-input-group">
                <label>Họ và tên</label>
                <input type="text" name="name" placeholder="Họ và tên" />
            </div>
            <div class="info-input-group">
                <label>Số điện thoại</label>
                <input type="text" name="phone" placeholder="Số điện thoại" />
            </div>
            <div class="info-input-group">
                <label>Email</label>
                <input type="text" name="email" placeholder="Email" />
            </div>
            <div class="info-input-group">
                <label>Tên đăng nhập</label>
                <input type="text" name="username" placeholder="Tên đăng nhập" />
            </div>
            <div class="info-input-group">
                <label>Sinh nhật</label>
                <select id="day" name="day">
                    <option value="" disabled selected>Chọn ngày</option>
                    @for ($i = 1; $i <= 31; $i++)
                    <option value="{{$i}}">{{ $i < 10 ? sprintf("%02d", $i) : $i }}</option>
                    @endfor
                </select>
                <select id="month" name="month">
                    <option value="" disabled selected>Chọn tháng</option>
                    @for ($i = 1; $i <= 12; $i++)
                    <option value="{{$i}}">{{ $i < 10 ? sprintf("%02d", $i) : $i }}</option>
                    @endfor
                </select>
                <select id="year" name="year">
                    <option value="" disabled selected>Chọn năm</option>
                    @for ($i = 1940; $i <= date("Y"); $i++)
                    <option value="{{$i}}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="info-input-group">
                <label class="non-block">Giới tính</label>
                <div class="gender-radio non-block">
                    <label>
                    <input class="with-gap" name="gender" type="radio" value="1" />
                    <span>Nam</span>
                    </label>
                </div>
                <div class="gender-radio non-block">
                    <label>
                    <input class="with-gap" name="gender" type="radio" value="0" />
                    <span>Nữ</span>
                    </label>
                </div>
            </div>
            <div class="info-input-group btn-group">
                <button type="submit" value="Cập nhật">Cập nhật</button>
            </div>
        </form>
    </div>
</div>
</div>
@endsection

@section('footer')
@include('layouts.footer', ['status' => 'complete'])
@endsection

@section('scripts')
<script src="{{ asset('public/assets/scripts/iphukien/user/user-top.js') }}"></script>
<script>
$(document).on("click", ".current-avatar",function(){
    $( "#avatar" ).trigger("click");
});
$(document).on("change", "#avatar",function(){
    if (this.files && this.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#current-avatar').attr('style','background-image:url("'+e.target.result+'") !important'); 
        }
        reader.readAsDataURL(this.files[0]);
    }
});
$(document).ready(function () {
    let day = document.querySelectorAll('#day');
    M.FormSelect.init(day, {"classes": "user-select"});
    let month = document.querySelectorAll('#month');
    M.FormSelect.init(month);
    let year = document.querySelectorAll('#year');
    M.FormSelect.init(year);
});
</script>
@endsection