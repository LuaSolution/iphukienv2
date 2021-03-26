@extends('layouts.app')

@section('title', 'Đăng nhập')

@section('header')
@include('layouts.header', ['status' => 'complete'])
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/signup.css') }}">
@endsection

@section('content')
<div class="ipk-container signup-container">
    <div class="ipk-content-container">
        <div class="title">Nhập thông tin của bạn</div>
        <form method="post">
            <div class="input-group">
                <input type="text" name="name" placeholder="Họ & tên *" class="input" />
                <span>Vui lòng điền đẩy đủ Họ & Tên</span>
            </div>
            <div class="input-group">
                <input type="text" name="phone" placeholder="Số điện thoại *" class="input" />
                <span>Ví dụ: 0866909606</span>
            </div>
            <div class="input-group">
                <input type="text" name="email" placeholder="Email *" class="input" />
                <span>Ví dụ: iphukien.vn@gmail.com</span>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Mật khẩu *" class="input-half" />
                <input type="password" name="retype-password" placeholder="Nhập lại mật khẩu *" class="input-half" />
            </div>
            <div class="or-group">
                <div class="or-label">Hoặc tạo tài khoản bằng</div>
                <div class="options">
                    <span class="fb"></span>
                    <span class="or-txt">Hoặc</span>
                    <span class="gg"></span>
                </div>
            </div>
            <div class="policy">
                <p>
                    <label>
                        <input type="checkbox" />
                        <span>Tôi chấp nhận những <a href="" target="_blank"><i>điều khoản</i></a> của Brand</span>
                    </label>
                </p>
            </div>
            <input type="submit" name="submit-signup" value="Đăng ký" class="submit-signup-form" />
        </form>
    </div>
</div>
@endsection

@section('footer')
@include('layouts.footer', ['status' => 'complete'])
@endsection