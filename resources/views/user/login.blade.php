@extends('layouts.app')

@section('title', 'Đăng nhập')

@section('header')
@include('layouts.header', ['status' => 'complete'])
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/login.css') }}">
@endsection

@section('fb-sdk')
<div id="fb-root"></div>
<script>
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v10.0&appId=595244321434114";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
@endsection

@section('content')
<div class="ipk-container login-container">
    <div class="ipk-content-container">
        <div class="row">
            <div class="col l8 s12">
                <div class="title">Tôi đã có tài khoản</div>
                <div class="sub-title">Nhập địa chỉ EMAIL/ SĐT và mật khẩu để đăng nhập</div>
                <form class="login-form" method="POST" action="{{ route('doLogin') }}">
                    {{ csrf_field() }}
                    <input type="text" name="email" placeholder="EMAIL/ SĐT" class="ipk-form-input" />
                    <input type="password" name="password" placeholder="Mật khẩu" class="ipk-form-input" />
                    <a href="{{ route('forgot-password') }}" class="forgot-pass-btn">Quên mật khẩu?</a>
                    <input type="submit" value="Đăng nhập" class="btn-dang-nhap" />
                </form>
                <div class="or-group">
                    <div class="or-label">Hoặc tạo tài khoản bằng</div>
                    <div class="options">
                        <span class="fb" onclick="loginFb()">Đăng nhập</span>
                        <span class="or-txt">Hoặc</span>
                        <span class="gg g-signin2 login-google" data-onsuccess="onSignIn"></span>
                    </div>
                </div>
            </div>

            <div class="col l4 s12">
                <div class="title">Người dùng mới</div>
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
<script>
function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    console.log('ID: ' + profile.getId());
    console.log('Name: ' + profile.getName());
    console.log('Image URL: ' + profile.getImageUrl());
    console.log('Email: ' + profile.getEmail());
    // gUser = profile;
    doLogin(profile.getName(), profile.getEmail(), `social_${profile.getId()}`) 
}
// function loginWithGG() {
//     doLogin(gUser.getName(), gUser.getEmail(), `social_${gUser.getId()}`) 
// }
function doLogin(name, email, pass) {
    $.post( "{{route('ajax.login-with-social')}}", {
        name: name,
        email: email,
        password: pass,
        _token: `{{ csrf_token() }}`
    })
    .done(function( data ) {
        let code = JSON.parse(data).code;
        if(code == 1) window.location.href = "{{ route('getHome') }}"
        M.toast({
            html: JSON.parse(data).message,
            classes: 'add-cart-fail'
        })
    });
}

/**  facebook */
window.fbAsyncInit = function() {
    FB.init({
      appId      : '595244321434114',
      cookie     : true,
      xfbml      : true,
      version    : 'v10.0'
    });

};

function loginFb() {
    $(".ipk-preloader").removeClass('hide');
    FB.login(function(response) {
        if (response.status === 'connected') {
            console.log("res", response);
            FB.api('/me?fields=id,email,name', function(loginRes) {
                doLogin(loginRes.name, loginRes.email, `social_${loginRes.id}`)
            });
        }
    }, {scope: 'public_profile,email'});
}
</script>
@endsection