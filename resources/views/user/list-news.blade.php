@extends('layouts.app')

@section('title', 'iPhuKien - Phụ kiện chính hãng')

@section('header')
@include('layouts.header', ['status' => 'complete'])
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/header.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/list-news.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/footer.css') }}">
@endsection

@section('content')
<div class="ipk-container">
    <div class="ipk-content-container list-news-container">
        <div class="list-news-txt">Tin tức</div>
        <div class="row list-news">

            <ul class="row tiles-wrap animated" id="wookmark1">
                <!-- These are our grid blocks -->
                <li class="col m4 s6 news-item">
                    <a href="{{ route('news.show', 1) }}">
                        <img src="{{ asset('public/assets/images/demo/list-news/2.png') }}">
                        <div class="news-title">PHỤ KIỆN APPLE WATCH</div>
                        <div class="news-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Viverra cras in aliquam viverra consequat facilisis facilisi viverra vulputate.</div>
                    </a>
                </li>
                <li class="col m4 s6 news-item">
                    <img src="{{ asset('public/assets/images/demo/list-news/3.png') }}">
                    <div class="news-title">PHỤ KIỆN APPLE WATCH</div>
                    <div class="news-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Viverra cras in aliquam viverra consequat facilisis facilisi viverra vulputate.</div>
                </li>
                <li class="col m4 s6 news-item">
                    <img src="{{ asset('public/assets/images/demo/list-news/4.png') }}">
                    <div class="news-title">PHỤ KIỆN APPLE WATCH</div>
                    <div class="news-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Viverra cras in aliquam viverra consequat facilisis facilisi viverra vulputate.</div>
                </li>
                <li class="col m4 s6 news-item">
                    <img src="{{ asset('public/assets/images/demo/list-news/5.png') }}">
                    <div class="news-title">PHỤ KIỆN APPLE WATCH</div>
                    <div class="news-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Viverra cras in aliquam viverra consequat facilisis facilisi viverra vulputate.</div>
                </li>
                <li class="col m4 s6 news-item">
                    <img src="{{ asset('public/assets/images/demo/list-news/1.png') }}">
                    <div class="news-title">PHỤ KIỆN APPLE WATCH</div>
                    <div class="news-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Viverra cras in aliquam viverra consequat facilisis facilisi viverra vulputate.</div>
                </li>
                <li class="col m4 s6 news-item">
                    <img src="{{ asset('public/assets/images/demo/list-news/6.png') }}">
                    <div class="news-title">PHỤ KIỆN APPLE WATCH</div>
                    <div class="news-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Viverra cras in aliquam viverra consequat facilisis facilisi viverra vulputate.</div>
                </li>
                <li class="col m4 s6 news-item">
                    <img src="{{ asset('public/assets/images/demo/list-news/7.png') }}">
                    <div class="news-title">PHỤ KIỆN APPLE WATCH</div>
                    <div class="news-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Viverra cras in aliquam viverra consequat facilisis facilisi viverra vulputate.</div>
                </li>
                <li class="col m4 s6 news-item">
                    <img src="{{ asset('public/assets/images/demo/list-news/8.png') }}">
                    <div class="news-title">PHỤ KIỆN APPLE WATCH</div>
                    <div class="news-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Viverra cras in aliquam viverra consequat facilisis facilisi viverra vulputate.</div>
                </li>
                <li class="col m4 s6 news-item">
                    <img src="{{ asset('public/assets/images/demo/list-news/9.png') }}">
                    <div class="news-title">PHỤ KIỆN APPLE WATCH</div>
                    <div class="news-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Viverra cras in aliquam viverra consequat facilisis facilisi viverra vulputate.</div>
                </li>
                <li class="col m4 s6 news-item">
                    <img src="{{ asset('public/assets/images/demo/list-news/10.png') }}">
                    <div class="news-title">PHỤ KIỆN APPLE WATCH</div>
                    <div class="news-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Viverra cras in aliquam viverra consequat facilisis facilisi viverra vulputate.</div>
                </li>
                <li class="col m4 s6 news-item">
                    <img src="{{ asset('public/assets/images/demo/list-news/11.png') }}">
                    <div class="news-title">PHỤ KIỆN APPLE WATCH</div>
                    <div class="news-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Viverra cras in aliquam viverra consequat facilisis facilisi viverra vulputate.</div>
                </li>
                <li class="col m4 s6 news-item">
                    <img src="{{ asset('public/assets/images/demo/list-news/12.png') }}">
                    <div class="news-title">PHỤ KIỆN APPLE WATCH</div>
                    <div class="news-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Viverra cras in aliquam viverra consequat facilisis facilisi viverra vulputate.</div>
                </li>
                <li class="col m4 s6 news-item">
                    <img src="{{ asset('public/assets/images/demo/list-news/13.png') }}">
                    <div class="news-title">PHỤ KIỆN APPLE WATCH</div>
                    <div class="news-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Viverra cras in aliquam viverra consequat facilisis facilisi viverra vulputate.</div>
                </li>
                <li class="col m4 s6 news-item">
                    <img src="{{ asset('public/assets/images/demo/list-news/14.png') }}">
                    <div class="news-title">PHỤ KIỆN APPLE WATCH</div>
                    <div class="news-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Viverra cras in aliquam viverra consequat facilisis facilisi viverra vulputate.</div>
                </li>
                <li class="col m4 s6 news-item">
                    <img src="{{ asset('public/assets/images/demo/list-news/15.png') }}">
                    <div class="news-title">PHỤ KIỆN APPLE WATCH</div>
                    <div class="news-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Viverra cras in aliquam viverra consequat facilisis facilisi viverra vulputate.</div>
                </li>
            </ul>

        </div>
    </div>
</div>
@endsection

@section('footer')
@include('layouts.footer', ['status' => 'complete'])
@endsection

@section('scripts')
<script src="{{ asset('public/assets/scripts/iphukien/user/header.js') }}"></script>
<script src="{{ asset('public/assets/scripts/iphukien/user/wookmark.min.js') }}"></script>
<script>
window.onload = function() {
    var wookmark1 = new Wookmark('#wookmark1', {
        outerOffset: 10,
        itemWidth: '30%',
        container: $('.list-news'),
    });
};
</script>
@endsection
