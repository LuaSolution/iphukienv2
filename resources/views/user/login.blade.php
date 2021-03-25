@extends('layouts.app')

@section('title', 'Đăng nhập')

@section('header')
@include('layouts.header', ['status' => 'complete'])
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('public/iphukien/user/header.css') }}">
<link rel="stylesheet" href="{{ asset('public/iphukien/user/login.css') }}">
<link rel="stylesheet" href="{{ asset('public/iphukien/user/footer.css') }}">
@endsection

@section('content')
<div class="ipk-container login-container">
    <div class="ipk-content-container">
        <div class="row">
            <div class="col l8 s12">
                <div class="title">Tôi đã có tài khoản</div>
                <div class="sub-title">Nhập địa chỉ EMAIL/ SĐT và mật khẩu để đăng nhập</div>
                <form method="post">
                    <input type="text" name="email_phone" placeholder="EMAIL/ SĐT" class="ipk-form-input" />
                    <input type="password" name="password" placeholder="Mật khẩu" class="ipk-form-input" />
                    <a href="{{ route('forgot-password') }}" class="forgot-pass-btn">Quên mật khẩu?</a>
                    <input type="submit" value="Đăng nhập" class="btn-dang-nhap" />
                </form>
            </div>
            <div class="col l4 s12">
                <div class="title">Người đùng mới</div>
                <div class="sub-title">Bạn chưa có tài khoản? Vui lòng đăng ký mới</div>
                <div class="create-account-btn">
                    <a href="{{ route('signup') }}">Tạo tài khoản</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
@include('layouts.footer', ['status' => 'complete'])
@endsection

@section('scripts')
<script src="{{ asset('public/assets/scripts/iphukien/user/header.js') }}"></script>
@endsection