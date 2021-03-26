@extends('layouts.app')

@section('title', $data->name)

@section('header')
@include('layouts.header', ['status' => 'complete'])
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/cart.css') }}">
@endsection

@section('content')
<div class="ipk-container cart-container" style="padding-bottom: 20px">
    <div class="ipk-content-container">
        <div class="title">{{ $data->name }}</div>
        <div class="products-wrapper">
           {!! $data->content !!}
        </div>
    </div>
</div>
@endsection

@section('footer')
@include('layouts.footer', ['status' => 'complete'])
@endsection

@section('scripts')
<script src="{{ asset('public/assets/scripts/iphukien/user/cart.js') }}"></script>
@endsection