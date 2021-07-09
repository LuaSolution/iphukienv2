$(document).ready(function () {
    // create menu mobi
  $('.hambeger').on('click', function() {
    var x = document.getElementById("main-menu");
    if (x.className === "nav-main") {
      x.className += " responsive";
    } else {
      x.className = "nav-main";
    }
  });

  var insta = $(document).find('#instafeed');
// instafeed
  if(insta.length){
    var feed = new Instafeed({
      resolution: 'low_resolution',
      get: 'user',
      limit:10,
      userId: 7978597270,
      accessToken: '7978597270.1677ed0.6945c5115c87462795ac3db1688b1e38',
      after: function(){
        jQuery("#instafeed a").attr("target","_blank");
          jQuery("#instafeed").not('.slick-initialized').slick({
            slidesToShow: 7,
              slidesToScroll: 7,
              arrows: true,
              nextArrow: '<button type="button" class="slick-next"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 17 33" xml:space="preserve"><title>svg-arrow-next</title><g id="e4eb89a6-f885-43b8-9259-0d6b1516fab0"><g id="_x38_e584754-6657-46f1-a9d8-2cfd6623b552"><g><polygon points="14.9,14.5 0,0 0,3.7 11.1,14.5 13.2,16.5 11.1,18.5 0,29.3 0,33 14.9,18.5 17,16.5 "/></g></g></g></svg></button>',
              prevArrow: '<button type="button" class="slick-prev"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17 33"><title>svg-arrow-prev</title><g id="7f9a1925-e8c7-4614-8787-3c6095a9f6e1" data-name="Layer 2"><g id="c9b7920a-81fa-4bfe-ad13-4da717c6854b" data-name="Layer 1"><g id="c2d982ff-0cf6-4220-b365-47f30d708fea" data-name="e4eb89a6-f885-43b8-9259-0d6b1516fab0"><g id="f51d455e-6b9c-4c4e-96db-a5004582beda" data-name="8e584754-6657-46f1-a9d8-2cfd6623b552"><polygon points="0 16.5 2.1 18.5 17 33 17 29.3 5.9 18.5 3.8 16.5 5.9 14.5 17 3.7 17 0 2.1 14.5 0 16.5"/></g></g></g></g></svg></button>',
              speed : 1000,   
              dots: false,
            
              centerMode: true,
            centerPadding: '100px',
            
              responsive: [
                {
                  breakpoint: 1025,
                  settings: {
                    slidesToShow: 6,
                    slidesToScroll: 6      
                  }
                },
                {
                  breakpoint: 1024,
                  settings: {
                    slidesToShow: 5,
                    slidesToScroll: 5,
                    dots: false,
                    arrows: true
                  }
                },
                {
                  breakpoint: 767,
                  settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    dots: false,
                    arrows: true
                  }
                },
                {
                  breakpoint: 480,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: false,
                    arrows: true
                  }
                }
              ]
            });
        }
    });
    feed.run();
  };

  // tour detail
  var tourDetail =   $(document).find('.feature-img-wrap');
  if (tourDetail.length){
      $('.feature-img').not('.slick-initialized').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          fade: false,
          infinite:true,
          asNavFor: '.thumbnail-img'
      });
      $('.thumbnail-img').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.feature-img',
        dots: false,
        arrows:true,
        infinite:true,
        focusOnSelect: true,
        prevArrow:'<div class="priv"><i class="fa fa-angle-left"></i></div',
        nextArrow:'<div class="next"><i class="fa fa-angle-right"></i></div',
        responsive: [
              {
                breakpoint: 1025,
                settings: {
                  slidesToShow: 4,
                  slidesToScroll: 1      
                }
              },
              {
                breakpoint: 1024,
                settings: {
                  slidesToShow: 4,
                  slidesToScroll: 1,
                  dots: false,
                  arrows: true
                }
              },
              {
                breakpoint: 767,
                settings: {
                  slidesToShow: 3,
                  slidesToScroll: 1,
                  dots: false,
                  arrows: true
                }
              },
              {
                breakpoint: 480,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 2,
                  dots: false,
                  arrows: true
                }
              }
            ]
      });
        // scroll 
      var w = $(window).width();
      if (w > 992 ){
        var parentHeight = $('.block-tour-info').height(),
            elementHeight = $('.wrap-info').height(),
            parentTop = $('.block-tour-info').offset().top,
            elementWidth = $('.wrap-info').width(),
            caculw = parentHeight + parentTop - elementHeight;

        $('.block-info .wrap-info').appendTo($('.block-tour-info'));
        $(window).scroll(function(){
          if($(window).scrollTop() >= parentTop && $(window).scrollTop() < caculw){
              $('.block-tour-info .wrap-info').css('width',elementWidth);
              $('.block-tour-info .wrap-info').css({'position':'fixed','top':'0px','bottom':'auto'})
          }else if($(window).scrollTop() >= caculw){
              $('.block-tour-info .wrap-info').css({'position':'absolute','top':'auto','bottom':'0px'})
          }else{
              $('.block-tour-info .wrap-info').css('position','static');
          }
        });//end window scroll
      }else{
        $('.block-tour-info .wrap-info').appendTo($('.block-info'));
      }//end if check mobi 
       
  }// end check tour detail page available

  // Get data for booking
  $('#form-booking').on('show.bs.modal', function () {
    var tour_date = $("#tour-date option:selected").text();
    var tour_price = $("#tour-date option:selected").attr('price');

    $("#inputPrice").text(tour_price);
    $("#inputDate").text(tour_date);
    $("input[name='date']").val(tour_date);
  })
});

