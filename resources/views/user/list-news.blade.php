@extends('layouts.app')

@section('title', 'iPhuKien - Phụ kiện chính hãng')

@section('header')
@include('layouts.header', ['status' => 'complete'])
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/list-news.css') }}">
@endsection

@section('content')
<div class="ipk-container">
    <div class="ipk-content-container list-news-container">
        <div class="list-news-txt">Tin tức</div>
        <div class="row list-news">

            <ul class="row tiles-wrap animated" id="wookmark1">
                <!-- These are our grid blocks -->
                @foreach($newss as $item)
                <li class="col m4 s6 news-item">
                    <a href="{{route('news.show', ['news' => $item->slug])}}">
                        <img src="{{asset('public/img/post/'.$item->cover)}}">
                        <div class="news-title">{{$item->title}}</div>
                        <div class="news-content">{{$item->description}}</div>
                    </a>
                </li>
                @endforeach
            </ul>

        </div>
    </div>
</div>
@endsection

@section('footer')
@include('layouts.footer', ['status' => 'complete'])
@endsection

@section('scripts')
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
