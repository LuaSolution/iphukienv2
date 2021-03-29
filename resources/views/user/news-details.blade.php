@extends('layouts.app')

@section('title', 'iPhuKien - Phụ kiện chính hãng')

@section('header')
@include('layouts.header', ['status' => 'complete'])
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/news-details.css') }}">
@endsection

@section('content')
<div class="ipk-container">
    <div class="ipk-content-container news-details-container">
        <div class="news-details-wrapper">
            <div class="news-details-line-1">
                <div class="news-title">Tiêu đề của bài viết này</div>
                <div class="share-block">
                    <span>Chia sẻ:</span>
                    <a href="" class="fb-share"></a>
                    <a href="" class="instagram-share"></a>
                    <a href="" class="pinterest-share"></a>
                    <a href="" class="twister-share"></a>
                    <a href="" class="email-share"></a>
                </div>
            </div>
            <div class="news-details-line-2">
                20-10-2021
            </div>
            <div class="news-details">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Id eu arcu dolor rhoncus velit. Id commodo, blandit
                tincidunt elementum cras convallis. Dis cursus eget tempus et, elit lectus quis purus iaculis. Pulvinar
                nunc, proin vestibulum aliquet leo elementum et ultrices aliquam. Vehicula quam elit elit at potenti etiam
                sem tincidunt cursus. Erat amet nunc risus purus, velit in. Dictum tristique mus montes, urna orci, at.
                Risus, egestas morbi nulla vulputate lacus enim, elit nec.
                Vel mi feugiat enim cum lacus enim, ullamcorper augue lacus. Bibendum eros tristique id aenean est orci,
                pretium pharetra, diam. Dignissim morbi quis quis sit nec non nisl. Cursus in malesuada mauris, tristique.
                Orci nunc eget leo pretium. Egestas proin mattis sodales praesent nisl aliquet nulla vestibulum. Posuere at
                duis facilisis malesuada at semper. Est enim pellentesque egestas in aliquam velit risus. Augue congue
                aliquet lobortis amet, dignissim. Vel nulla pretium vel senectus sed sagittis. Est eu sed posuere sed arcu
                egestas pulvinar adipiscing eget.
                <img src="{{ asset('public/assets/images/demo/content_image.png') }}" />
                Risus eget vitae ultrices amet cras. Suspendisse dolor ultrices vitae donec amet. Egestas sit vitae, aenean
                risus eros in aliquam. Volutpat lectus nisi ut id vitae. Dui, a, tincidunt pulvinar viverra quisque
                venenatis nunc, metus. Duis velit nascetur nibh ultricies malesuada massa lectus id ut. Pulvinar in mauris,
                ornare pharetra adipiscing. Imperdiet nunc cursus iaculis tempus, dolor. Elit eget eros, ac dictum cursus.
                Sed eu, velit eget gravida a leo. Sed tincidunt varius aliquam vel sed purus pretium massa. Id quisque
                nullam non non pellentesque. Rhoncus sed luctus etiam leo vitae nullam fermentum.
                Cras sociis tellus magna pharetra, est, ut risus, vivamus quis. Sed lorem vel nascetur etiam risus aliquam
                cras bibendum facilisis. Egestas dolor consectetur semper scelerisque ullamcorper nunc eget. Eu integer id
                ut leo scelerisque risus massa purus duis. Integer cursus hendrerit pellentesque volutpat nibh mollis quam
                arcu non. Tempor nunc ornare mi ornare eu. Sit turpis scelerisque mattis commodo diam facilisis. Nascetur
                arcu eget ridiculus parturient neque pharetra mi. Lectus nunc fringilla eleifend convallis ultrices purus
                lectus. Metus dolor in accumsan venenatis, morbi mauris vivamus scelerisque eget. Enim massa ligula leo
                viverra maecenas morbi adipiscing sit porttitor. Leo turpis morbi elementum hac rhoncus, elit nunc sit ut.
                Malesuada diam, amet neque, adipiscing ullamcorper tempor sit. Sit eget et nisi, fermentum fringilla diam
                sagittis, enim porta. Risus, scelerisque egestas pharetra est. Morbi dolor at phasellus bibendum purus.
                Vulputate lobortis eget enim, vitae auctor accumsan nibh. Tellus, faucibus vitae sodales lacinia enim mauris
                lorem habitant blandit. Mus fames lectus volutpat, vulputate et aliquam nisl arcu etiam. Turpis iaculis
                integer est posuere amet, a. Sit at ultrices vel, augue. Lobortis purus pulvinar cum nunc blandit eget eu
                vulputate.
            </div>
        </div>
        <div class="list-same-news">
            <div class="same-news-txt">Tin tức liên quan</div>
            <div class="same-news-wrapper">
                <div class="carousel carousel-slider">
                    <a href="#!" class="same-news-back"><i class="large material-icons">arrow_back</i></a>
                    
                    <div class="row carousel-item">
                        <div class="col m3 s6 news-item">
                            <div class="news-img" style="background-image: url({{ asset('public/assets/images/demo/day_da_watch.png') }})"></div>
                            <div class="news-title">Tin tức hôm nay là...</div>
                            <div class="news-content">Namaskar, welcome to Incredible India, where culture echoes, tradition speaks, beauty enthralls and diversity delights… </div>
                            <div class="news-last-line">
                                <span>22/10/2020</span>
                                <a href="#">Chi tiết</a>
                            </div>
                        </div>
                        <div class="col m3 s6 news-item">
                            <div class="news-img" style="background-image: url({{ asset('public/assets/images/demo/day_da_watch.png') }})"></div>
                            <div class="news-title">Tin tức hôm nay là...</div>
                            <div class="news-content">Namaskar, welcome to Incredible India, where culture echoes, tradition speaks, beauty enthralls and diversity delights… </div>
                            <div class="news-last-line">
                                <span>22/10/2020</span>
                                <a href="#">Chi tiết</a>
                            </div>
                        </div>
                        <div class="col m3 s6 news-item">
                            <div class="news-img" style="background-image: url({{ asset('public/assets/images/demo/day_da_watch.png') }})"></div>
                            <div class="news-title">Tin tức hôm nay là...</div>
                            <div class="news-content">Namaskar, welcome to Incredible India, where culture echoes, tradition speaks, beauty enthralls and diversity delights… </div>
                            <div class="news-last-line">
                                <span>22/10/2020</span>
                                <a href="#">Chi tiết</a>
                            </div>
                        </div>
                        <div class="col m3 s6 news-item">
                            <div class="news-img" style="background-image: url({{ asset('public/assets/images/demo/day_da_watch.png') }})"></div>
                            <div class="news-title">Tin tức hôm nay là...</div>
                            <div class="news-content">Namaskar, welcome to Incredible India, where culture echoes, tradition speaks, beauty enthralls and diversity delights… </div>
                            <div class="news-last-line">
                                <span>22/10/2020</span>
                                <a href="#">Chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="row carousel-item">
                        <div class="col m3 s6 news-item">
                            <div class="news-img" style="background-image: url({{ asset('public/assets/images/demo/day_da_watch.png') }})"></div>
                            <div class="news-title">Tin tức hôm nay là...</div>
                            <div class="news-content">Namaskar, welcome to Incredible India, where culture echoes, tradition speaks, beauty enthralls and diversity delights… </div>
                            <div class="news-last-line">
                                <span>22/10/2020</span>
                                <a href="#">Chi tiết</a>
                            </div>
                        </div>
                        <div class="col m3 s6 news-item">
                            <div class="news-img" style="background-image: url({{ asset('public/assets/images/demo/day_da_watch.png') }})"></div>
                            <div class="news-title">Tin tức hôm nay là...</div>
                            <div class="news-content">Namaskar, welcome to Incredible India, where culture echoes, tradition speaks, beauty enthralls and diversity delights… </div>
                            <div class="news-last-line">
                                <span>22/10/2020</span>
                                <a href="#">Chi tiết</a>
                            </div>
                        </div>
                        <div class="col m3 s6 news-item">
                            <div class="news-img" style="background-image: url({{ asset('public/assets/images/demo/day_da_watch.png') }})"></div>
                            <div class="news-title">Tin tức hôm nay là...</div>
                            <div class="news-content">Namaskar, welcome to Incredible India, where culture echoes, tradition speaks, beauty enthralls and diversity delights… </div>
                            <div class="news-last-line">
                                <span>22/10/2020</span>
                                <a href="#">Chi tiết</a>
                            </div>
                        </div>
                        <div class="col m3 s6 news-item">
                            <div class="news-img" style="background-image: url({{ asset('public/assets/images/demo/day_da_watch.png') }})"></div>
                            <div class="news-title">Tin tức hôm nay là...</div>
                            <div class="news-content">Namaskar, welcome to Incredible India, where culture echoes, tradition speaks, beauty enthralls and diversity delights… </div>
                            <div class="news-last-line">
                                <span>22/10/2020</span>
                                <a href="#">Chi tiết</a>
                            </div>
                        </div>
                    </div>

                    <a href="#!" class="same-news-next"><i class="large material-icons">arrow_forward</i></a>
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
<script>
$(document).ready(function () {
    $('.carousel.carousel-slider').carousel({ fullWidth: true });
});
$(document).on("click", ".same-news-back", function () {
    $('.carousel.carousel-slider').carousel('prev');
});
$(document).on("click", ".same-news-next", function () {
    $('.carousel.carousel-slider').carousel('next');
});
</script>
@endsection
