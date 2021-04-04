@extends('layouts.app')

@section('title', 'Quên mật khẩu')

@section('header')
@include('layouts.header', ['status' => 'complete'])
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/forgot-password.css') }}">
@endsection

@section('content')
<div class="ipk-container forgot-password-container">
    <div class="ipk-content-container">
        <div class="title">Tìm lại mật khẩu</div>
        <form method="post">
            <input type="text" name="email" placeholder="Vui lòng nhập email để lấy lại mật khẩu" class="email" />
            <input type="submit" name="submit-forgot-password" value="Gửi" class="submit-forgot-password-form" />
        </form>
    </div>
</div>
@endsection
