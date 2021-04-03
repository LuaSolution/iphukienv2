@extends('layouts.app')

@section('title', 'iPhuKien - Phụ kiện chính hãng')

@section('header')
@include('layouts.header', ['status' => 'complete'])
@endsection

@section('styles')
<link rel="stylesheet"
    href="{{ asset('public/assets/styles/iphukien/user/news-details.css') }}">
@endsection

@section('content')
<div class="ipk-container">
    <div class="ipk-content-container news-details-container">
        <div class="news-details-wrapper">
            <div class="news-details-line-1">
                <div class="news-title">{{ $news->title }}</div>
                <div class="share-block">
                    <span>Chia sẻ:</span>
                    <a href="" class="fb-share"></a>
                </div>
            </div>
            <div class="news-details-line-2">
                {{ $news->created_at }}
            </div>
            <div class="news-details">
                {!! $news->content !!}
            </div>
        </div>
        <div class="list-same-news">
            <div class="same-news-txt">Tin tức liên quan</div>
            <div class="same-news-wrapper">
                <div class="carousel carousel-slider">
                    <!-- <a href="#!" class="same-news-back"><i class="large material-icons">arrow_back</i></a> -->

                    <div class="row carousel-item">
                        @foreach($newsRelated as $item)
                            <div class="col m3 s6 news-item">
                                <div class="news-img"
                                    style="background-image: url({{ asset('public/assets/images/demo/day_da_watch.png') }})">
                                </div>
                                <div class="news-title">{{ $item->title }}</div>
                                <div class="news-content">{{ $item->description }}</div>
                                <div class="news-last-line">
                                    <span>{{ $item->created_at }}</span>
                                    <a href="{{route('news.show', ['news' => $item->slug])}}">Chi tiết</a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <!-- <a href="#!" class="same-news-next"><i class="large material-icons">arrow_forward</i></a> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<blade
    include|(%26%2339%3Blayouts.footer%26%2339%3B%2C%20%5B%26%2339%3Bstatus%26%2339%3B%20%3D%3E%20%26%2339%3Bcomplete%26%2339%3B%5D)%0D />
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('.carousel.carousel-slider').carousel({
            fullWidth: true
        });
    });
    $(document).on("click", ".same-news-back", function () {
        $('.carousel.carousel-slider').carousel('prev');
    });
    $(document).on("click", ".same-news-next", function () {
        $('.carousel.carousel-slider').carousel('next');
    });
</script>
@endsection
