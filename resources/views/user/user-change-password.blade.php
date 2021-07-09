@extends('layouts.app')

@section('title', 'Thông tin tài khoản')

@section('header')
@include('layouts.header', ['status' => 'complete'])
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/user-top.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/user-change-pass.css') }}">
@endsection

@section('content')
<div class="ipk-container">
    <div class="ipk-content-container user-change-pass-container">
        @include('layouts.user-top', ['status' => 1])
        <div class="user-change-pass-txt">THAY ĐỔI MẬT KHẨU</div>
        <form method="post" id="user-change-pass-form">
            <div class="pass-input-group">
                <input type="password" name="cPass" id="current-pass" placeholder="Mật khẩu hiện tại" />
            </div>
            <div class="pass-input-group">
                <input type="password" name="newPass" id="new-pass" placeholder="Mật khẩu mới" />
            </div>
            <div class="pass-input-group">
                <input type="password" name="confirmNewPass" id="confirm-new-pass" placeholder="Nhập lại mật khẩu mới" />
            </div>
            <div class="pass-input-group btn-group">
                <button type="submit" value="Cập nhật">Cập nhật</button>
            </div>
        </form>
    </div>
</div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('public/assets/scripts/iphukien/user/user-top.js') }}"></script>
<script>
$(document).on("submit", "#user-change-pass-form", function(e) {
    e.preventDefault();
    if ($("#current-pass").val() == '') {
        M.toast({
            html: 'Vui lòng nhập mật khẩu hiện tại',
            classes: 'add-cart-fail'
        });
        return false;
    }
    if ($("#new-pass").val() == '') {
        M.toast({
            html: 'Vui lòng nhập mật khẩu mới',
            classes: 'add-cart-fail'
        });
        return false;
    }
    if ($("#confirm-new-pass").val() == '') {
        M.toast({
            html: 'Vui lòng nhập mật khẩu xác nhận',
            classes: 'add-cart-fail'
        });
        return false;
    }
    if ($("#new-pass").val() != $("#confirm-new-pass").val()) {
        M.toast({
            html: 'Mật khẩu mới và mật khẩu xác nhận không trùng nhau',
            classes: 'add-cart-fail'
        });
        return false;
    }
    $.ajax({
        url: '{{route("user.do-change-password")}}',
        type: 'post',
        data: {
            'currentPass': $("#current-pass").val(),
            'newPass': $("#new-pass").val(),
            '_token': '{{ csrf_token() }}'
        }
    }).done(function(data) {
        let res = JSON.parse(data)
        if (res.code == 1) {
            M.toast({
                html: 'Cập nhật thành công',
                classes: 'add-cart-success'
            })
        } else {
            M.toast({
                html: res.message,
                classes: 'add-cart-fail'
            })
        }

    })
    .fail(function() {
        M.toast({
            html: 'Cập nhật không thành công',
            classes: 'add-cart-fail'
        })
    })
});
</script>
@endsection