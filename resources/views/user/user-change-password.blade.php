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
                <input type="text" name="cPass" placeholder="Mật khẩu hiện tại" />
            </div>
            <div class="pass-input-group">
                <input type="text" name="newPass" placeholder="Mật khẩu mới" />
            </div>
            <div class="pass-input-group">
                <input type="text" name="confirmNewPass" placeholder="Nhập lại mật khẩu mới" />
            </div>
            <div class="pass-input-group btn-group">
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
@endsection