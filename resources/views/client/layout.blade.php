<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Búp Bê</title>

  <!-- google fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,700&display=swap" rel="stylesheet">

  <!-- Template CSS -->
  <link href="{{ asset('public/assets/css/style-liberty.css') }}" type="text/css"
    rel="stylesheet" />
  <style>
    .input-file-container {
      position: relative;
      width: 225px;
    }

    .js .input-file-trigger {
      display: block;
      padding: 14px 45px;
      background: #39D2B4;
      color: #fff;
      font-size: 1em;
      transition: all .4s;
      cursor: pointer;
    }

    .js .input-file {
      position: absolute;
      top: 0;
      left: 0;
      width: 225px;
      opacity: 0;
      padding: 14px 0;
      cursor: pointer;
    }

    .js .input-file:hover+.input-file-trigger,
    .js .input-file:focus+.input-file-trigger,
    .js .input-file-trigger:hover,
    .js .input-file-trigger:focus {
      background: #34495E;
      color: #39D2B4;
    }

    .file-return {
      margin: 0;
    }

    .file-return:not(:empty) {
      margin: 1em 0;
    }

    .js .file-return {
      font-style: italic;
      font-size: .9em;
      font-weight: bold;
    }

    .js .file-return:not(:empty):before {
      content: "File đã up: ";
      font-style: normal;
      font-weight: normal;
    }
  </style>

<style>
.flex-container {
  display: flex;
  flex-wrap: nowrap;
  background-color: DodgerBlue;
}

.flex-container > div {
  background-color: #f1f1f1;
  width: 100px;
  margin: 10px;
  text-align: center;
  line-height: 75px;
  font-size: 30px;
}
</style>
</head>

<body>
  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0&appId=334203584515317&autoLogAppEvents=1"
    nonce="qpXNeq9z"></script>
  <!-- header -->
  <div class="w3l-header" id="home">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark pl-0 pr-0">
        <a class="navbar-brand m-0 text-primary" href="index.html">
          <span class="fa fa-gamepad"></span> Búp Bê </a>
        <!-- <span class="logo">portfolio</span>-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active mr-lg-4">
              <a class="nav-link pl-0 pr-0 font-weight-bold" href="{{ route('getHome') }}">
                Trang chủ
                <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item mr-lg-4">
              <a class="nav-link pl-0 pr-0 font-weight-bold" href="{{ url('gioi-thieu') }}">
                Tác giả</a>
            </li>
            <li class="nav-item mr-lg-4">
              <a class="nav-link pl-0 pr-0 font-weight-bold" href="{{ url('tin-tuc') }}">
                Bài viết</a>
            </li>
            <li class="nav-item mr-lg-4">
              <a class="nav-link pl-0 pr-0 font-weight-bold" href="{{ url('lien-he') }}">
                Liên hệ</a>
            </li>
            <li class="nav-item mr-lg-4">
              <a class="nav-link pl-0 pr-0 font-weight-bold" href="{{ url('dat-sach') }}">
                Đặt sách</a>
            </li>
            <li class="nav-item">
            @if(app()->getLocale() == 'en')
            <a  class="nav-link pl-0 pr-0 font-weight-bold" href="{!! route('user.change-language', ['vi']) !!}">Vietnam</a>
            @else
            <a  class="nav-link pl-0 pr-0 font-weight-bold" href="{!! route('user.change-language', ['en']) !!}">English</a>
            @endif
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
  <!-- //header -->
  <!-- banner slider -->
  <div class="w3l-banner-slider">
    <div class="wrapper-container">
      <main class="sliders-container">
        <ul class="pagination">
          <li class="pagination__item"><a class="pagination__button"></a></li>
          <li class="pagination__item"><a class="pagination__button"></a></li>
          <li class="pagination__item"><a class="pagination__button"></a></li>
          <li class="pagination__item"><a class="pagination__button"></a></li>
          <li class="pagination__item"><a class="pagination__button"></a></li>
        </ul>
      </main>
    </div>
  </div>
  <!-- //banner slider -->

  @yield('content')

  <!-- Footer -->
  <section class="w3l-footers-1">
    <div class="footer bg-secondary">
      <div class="container">
        <div class="footer-content">
          <div class="row">
            <div class="col-lg-8 footer-left">
              <p class="m-0">© Copyright 2020 Eccentric Portfolio.
              
                <!-- <a href="https://w3layouts.com">W3layouts</a></p> -->
            </div>
            <div class="col-lg-4 footer-right text-lg-right text-center mt-lg-0 mt-3">
              <ul class="social m-0 p-0">
                <li><a href="https://www.facebook.com/linhgiang.bui.1217" target="_blank"><span class="fa fa-facebook"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- //Footer -->

  <!-- move top -->
  <button onclick="topFunction()" id="movetop" class="bg-primary" title="Go to top">
    <span class="fa fa-angle-up"></span>
  </button>
  <script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () {
      scrollFunction()
    };

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("movetop").style.display = "block";
      } else {
        document.getElementById("movetop").style.display = "none";
      }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
  </script>
  <!-- /move top -->

  <!-- common jquery -->
  <script src="{{ asset('public/assets/js/jquery-3.3.1.min.js') }}" type="text/javascript">
  </script>
  <!-- //common jquery -->

  <!-- // for banner slider -->
  <script src="{{ asset('public/assets/js/momentum-slider.min.js') }}" type="text/javascript">
  </script>
  <script>
    (function () {

      var slidersContainer = document.querySelector('.sliders-container');

      // Initializing the numbers slider
      var msNumbers = new MomentumSlider({
        el: slidersContainer,
        cssClass: 'ms--numbers',
        range: [1, 5],
        rangeContent: function (i) {
          return '0' + i;
        },
        style: {
          transform: [{
            scale: [0.4, 1]
          }],
          opacity: [0, 1]
        },

        interactive: false
      });


      // Initializing the titles slider
      var titles = [
        'Tập 1',
        'Tập 2',
        'Tập 3',
        'Tập 4',
        'Tập 5'
      ];



      // Get pagination items
      var pagination = document.querySelector('.pagination');
      var paginationItems = [].slice.call(pagination.children);

      // Initializing the images slider
      var msImages = new MomentumSlider({
        // Element to append the slider
        el: slidersContainer,
        // CSS class to reference the slider
        cssClass: 'ms--images',
        // Generate the 4 slides required
        range: [0, 4],
        rangeContent: function () {
          return '<div class="ms-slide__image-container"><div class="ms-slide__image"></div></div>';
        },
        // Syncronize the other sliders
        sync: [msNumbers],
        // Styles to interpolate as we move the slider
        style: {
          '.ms-slide__image': {
            transform: [{
              scale: [1.5, 1]
            }]
          }
        },


        // Update pagination if slider change
        change: function (newIndex, oldIndex) {
          if (typeof oldIndex !== 'undefined') {
            paginationItems[oldIndex].classList.remove('pagination__item--active');
          }
          paginationItems[newIndex].classList.add('pagination__item--active');
        }
      });


      // Select corresponding slider item when a pagination button is clicked
      pagination.addEventListener('click', function (e) {
        if (e.target.matches('.pagination__button')) {
          var index = paginationItems.indexOf(e.target.parentNode);
          msImages.select(index);
        }
      });

    })();
  </script>
  <!-- // for banner slider -->

  <!--  bootstrap js -->
  <script src="{{ asset('public/assets/js/bootstrap.min.js') }}" type="text/javascript">
  </script>
  <!-- disable body scroll which navbar is in active -->
  <script>
    $(function () {
      $('.navbar-toggler').click(function () {
        $('body').toggleClass('noscroll');
      })
    });
  </script>
  <!-- disable body scroll which navbar is in active -->

</body>

</html>
