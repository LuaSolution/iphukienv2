@extends('client.layout')

@section('content')
<!-- about me -->
<div class="w3l-about py-5">
    <div class="container py-lg-3">
        <div class="row about-content mb-lg-5">
            <div class="col-lg-6 pr-md-5">
                <div class="image-block">
                    <img src="public/assets/images/me.jpg" class="img-fluid myphoto" alt="my photo" />
                    <img src="public/assets/images/cross.png" class="img-fluid pos" alt="dots" />
                </div>
            </div>
            <div class="col-lg-6 info pl-lg-5 mt-lg-0 mt-5 pt-lg-0 pt-3 align-center">
                <h4 class="">{{ __('i18n.i_am') }}</h4>
                <p class="mt-md-4 mt-3 mb-0">
                {!! __('i18n.my_profile') !!}
                </p>
                <img src="public/assets/images/signature.png" class="img-fluid signature" width="300px"
                    alt="my photo" />
                <p class="m-0 mb-2">Búp Bê</p>
                <h6>25/02/2021.</h6>
            </div>
        </div>
    </div>
</div>
<!-- //about me -->

<!-- about my profile -->
<section class="w3l-about-bottom py-5" id="about">
    <div class="container py-lg-5 py-md-3">
        <div class="row middle-grids">
            <div class="col-lg-7 advantage-grid-info">
                <div class="advantage_left">
                    <!-- <h4>Vài lời chia sẻ bạn đọc</h4> -->
                    <p class="">
                    {!! __('i18n.my_profile2') !!}
                    </p>
                    <p class="mb-0">
                    {!! __('i18n.childhood') !!}
                    </p>
                    <!-- <a href="#resume" class="primary-btn-style btn-primary btn mt-lg-5 mt-4">Download CV</a>
                        <a href="#contact" class="secondary-btn-style btn-secondary btn mt-lg-5 mt-4 ml-1">Hire
                            Me</a> -->
                </div>
            </div>
            <div class="col-lg-5 advantage-grid-info1">
                <div class="advantage_left1 mt-lg-0 mt-5">
                    <img src="public/assets/images/about.jpg" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //about my profile -->
<!-- my featured projects -->
<!-- <section class="w3l-block py-5">
        <div class="container py-lg-3">
            <h3 class="title mb-md-5 mb-4">Featured projects </h3>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 content" data-id="id-1" data-type="cat-item-1">
                    <span class="image-block">
                        <div class="content-overlay"></div>
                        <a class="image-zoom" href="#img">
                            <img src="public/assets/images/alexandra.jpg" class="img-fluid w3layouts agileits"
                                alt="portfolio-img">
                            <div class="content-details fadeIn-bottom">
                                <h3 class="content-title">This is a title</h3>
                                <p class="content-text">This is a short description</p>
                            </div>
                        </a>
                    </span>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 content mt-sm-0 mt-4" data-id="id-2" data-type="cat-item-2">
                    <span class="image-block">
                        <div class="content-overlay"></div>
                        <a class="image-zoom" href="#img">
                            <img src="public/assets/images/bench.jpg" class="img-fluid w3layouts agileits" alt="portfolio-img">
                            <div class="content-details fadeIn-bottom">
                                <h3 class="content-title">This is a title</h3>
                                <p class="content-text">This is a short description</p>
                            </div>
                        </a>
                    </span>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 content mt-md-0 mt-4" data-id="id-2" data-type="cat-item-2">
                    <span class="image-block">
                        <div class="content-overlay"></div>
                        <a class="image-zoom" href="#img">
                            <img src="public/assets/images/alexandra.jpg" class="img-fluid w3layouts agileits"
                                alt="portfolio-img">
                            <div class="content-details fadeIn-bottom">
                                <h3 class="content-title">This is a title</h3>
                                <p class="content-text">This is a short description</p>
                            </div>
                        </a>
                    </span>
                </div>
                <div class="content text-center mt-sm-5 mt-4">
                    <a href="#portfolio" class="btn btn-primary primary-btn-style">View more</a>
                </div>
            </div>
        </div>
    </section> -->
<!-- //my featured projects -->
@endsection
