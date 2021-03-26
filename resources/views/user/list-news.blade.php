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
            <div class="col m4 s6">

            </div>
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
    let options = {
        align: 'center',
        autoResize: false,
        comparator: null,
        container: $('body'),
        direction: undefined,
        ignoreInactiveItems: true,
        itemWidth: 0,
        fillEmptySpace: false,
        flexibleWidth: 0,
        offset: 2,
        onLayoutChanged: undefined,
        outerOffset: 0,
        possibleFilters: [],
        resizeDelay: 50,
        verticalOffset: undefined
    };
    $('#myElementContainer').wookmark(options);
</script>
@endsection
