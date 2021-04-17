@extends('layouts.app')

@section('title', 'Đăng nhập')

@section('header')
@include('layouts.header', ['status' => 'complete'])
@endsection

@section('meta-tags')
<meta name="google-signin-client_id" content="445632322462-522or3m8qn2qaikj451irtimtegv2bqe.apps.googleusercontent.com">
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/signup.css') }}">
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
<div class="ipk-container signup-container">
    <div class="ipk-content-container">
        <div class="title">Nhập thông tin của bạn</div>
        <form method="post">
            {{ csrf_field() }}
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
            <!-- <div class="or-group">
                <div class="or-label">Hoặc tạo tài khoản bằng</div>
                <div class="options">
                    <span class="fb" onclick="loginFb()">Đăng nhập</span>
                    <span class="or-txt">Hoặc</span>
                    <span class="gg g-signin2" data-onsuccess="onSignIn"></span>
                </div>
            </div> -->
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
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script>
function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  console.log('ID: ' + profile.getId());
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail());

  addUser(profile.getName(), profile.getEmail(), `google_${profile.getId()}`)
}

function addUser(name, email, pass) {
    $.post( "{{route('ajax.login-with-google')}}", {
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
    FB.login(function(response) {
        if (response.status === 'connected') {
            console.log(response);
            FB.api('/me?fields=id,email,name', function(response) {
                addUser(response.name, response.email, `facebook_${response.id}`)
            });
        }
    }, {scope: 'public_profile,email'});
}
</script>
@endsection
