$(document).ready(function(e) {$('img').each(function(index, element) {if(!$(this).attr('alt') || $(this).attr('alt')==''){$(this).attr('alt',tenct);}});});
function doEnter(evt){var key;if(evt.keyCode == 13 || evt.which == 13){onSearch(evt);}}
function onSearch(evt) {var keyword = document.getElementById("keyword").value;if(keyword=='' || keyword==nhaptukhoatimkiem){alert(chuanhaptukhoa);}else{location.href = "tim-kiem.html&keyword="+keyword;loadPage(document.location);}}
function doEnter2(evt){var key;if(evt.keyCode == 13 || evt.which == 13){onSearch2(evt);}}
function onSearch2(evt) {var keyword2 = document.getElementById("keyword2").value;if(keyword2=='' || keyword2==nhaptukhoatimkiem){alert(chuanhaptukhoa);}else{location.href = "tim-kiem.html&keyword="+keyword2;loadPage(document.location);}}$(document).ready(function() { $("#menu ul li").hover(function(){$(this).find('ul:first').css({visibility: "visible",display: "none"}).show(300); },function(){ $(this).find('ul:first').css({visibility: "hidden"});}); $("#menu ul li").hover(function(){$(this).find('>a').addClass('active2'); },function(){ $(this).find('>a').removeClass('active2'); }); });
$('.click_ajax').click(function(){if(isEmpty($('#ten_lienhe').val(), nhaphoten )){$('#ten_lienhe').focus();return false;}if(isEmpty($('#diachi_lienhe').val(), nhapdiachi)){$('#diachi_lienhe').focus();return false;}if(isEmpty($('#dienthoai_lienhe').val(), nhapsodienthoai)){$('#dienthoai_lienhe').focus();return false;}if(isPhone($('#dienthoai_lienhe').val(), nhapsodienthoai)){$('#dienthoai_lienhe').focus();return false;}if(isEmpty($('#email_lienhe').val(), emailkhonghople)){$('#email_lienhe').focus();return false;}if(isEmail($('#email_lienhe').val(), emailkhonghople)){$('#email_lienhe').focus();return false;}if(isEmpty($('#tieude_lienhe').val(), nhapchude)){$('#tieude_lienhe').focus();return false;}if(isEmpty($('#noidung_lienhe').val(), nhapnoidung)){$('#noidung_lienhe').focus();return false;}document.frm.submit();});
$(function() {$('.hien_menu').click(function(){$('nav#menu_mobi').css({height: "auto"});});$('nav#menu_mobi').mmenu({extensions: [ 'effect-slide-menu', 'pageshadow' ],searchfield: true,counters	: true,navbar : {title: 'Menu'},navbars: [{position: 'top',content: [ 'searchfield' ]}, {position	: 'top',content	: ['prev','title','close']}]});});
$(document).ready(function(){
  $('.dknhantin').click(function(event) {
    if(isEmpty($('.nhantin input[name="hoten"]').val(),nhaphoten)){$('.nhantin input[name="hoten"]').focus();return false;}
    if(isEmpty($('.nhantin input[name="dienthoai"]').val(), nhapsodienthoai)){$('.nhantin input[name="dienthoai"]').focus();return false;}
    if(isPhone($('.nhantin input[name="dienthoai"]').val(), nhapsodienthoai)){$('.nhantin input[name="dienthoai"]').focus();return false;}
    if(isEmpty($('.nhantin input[name="email"]').val(), emailkhonghople)){$('.nhantin input[name="email"]').focus();return false;}
    if(isEmail($('.nhantin input[name="email"]').val(), emailkhonghople)){$('.nhantin input[name="email"]').focus();return false;}
    $('.nhantin').submit();
  });
 $('.slick2').slick({
     slidesToShow: 1,
     slidesToScroll: 1,
     arrows: false,
     fade: true,
     autoplay:false,
     autoplaySpeed:5000,
     asNavFor: '.slick',
     adaptiveHeight: true
 });
 $('.slick').slick({
     slidesToShow: 4,
     slidesToScroll: 1,
     asNavFor: '.slick2',
     dots: false,
     centerMode: false,
     focusOnSelect: true
 });
  return false;
 });
var callback_error = function(element) {
  element.src ="https://via.placeholder.com/440x560/?text=No+Image";
};
var lazyLoadInstance = new LazyLoad({
    elements_selector: ".lazy",
    callback_error: callback_error
});
$(document).ready(function(){
 $('#content_tabs .tab').hide();
 $('#content_tabs .tab:first').show();
 $('#ultabs li:first').addClass('active');

 $('#ultabs li').click(function(){
   var vitri = $(this).data('vitri');
   $('#ultabs li').removeClass('active');
   $(this).addClass('active');

   $('#content_tabs .tab').hide();
   $('#content_tabs .tab:eq("'+vitri+'")').show();
   return false;
 });
});
$(document).ready(function(){
$(".color_item").click(function(){
 $(".color_item").removeClass("active");
 $(this).addClass("active");

})
$(".size_item").click(function(){
 $(".size_item").removeClass("active");
 $(this).addClass("active");

})
})
$(document).ready(function() {
  $('div.slick_sanpham').slick({
    lazyLoad: 'ondemand',
    infinite: true,
    accessibility:true,
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay:true,
    autoplaySpeed:3000,
    arrows:true,
    centerMode:false,
    dots:false,
    draggable:true,
    responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 4
      }
    },
    {
      breakpoint: 830,
      settings: {
        slidesToShow: 3
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2
      }
    },
    {
      breakpoint: 350,
      settings: {
        slidesToShow: 1
      }
    }
  ]
  });
  $('div.marquee').slick({
    lazyLoad: 'ondemand',
    infinite: true,
    accessibility:true,
    slidesToShow: 6,
    slidesToScroll: 1,
    autoplay:true,
    autoplaySpeed:3000,
    arrows:true,
    centerMode:false,
    dots:false,
    draggable:true,
    responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 5
      }
    },
    {
      breakpoint: 830,
      settings: {
        slidesToShow: 4
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 3
      }
    },
    {
      breakpoint: 420,
      settings: {
        slidesToShow: 2
      }
    }
  ]
  });
  $('div.slick_tintuc1').slick({
    lazyLoad: 'ondemand',
    infinite: true,
    accessibility:true,
    vertical:true,
    slidesToShow: 1,
    slidesToScroll: 1,
    rows:2,
    autoplay:false,
    autoplaySpeed:3000,
    arrows:false,
    centerMode:false,
    dots:false,
    draggable:true,
    mobileFirst:false
  });
  $("div.slick_tintuc").simplyScroll({orientation:'vertical'});
  $('.slick-slider').on('afterChange', function(slick, currentSlide){
    lazyLoadInstance.update();
  });
  $('.slick-slider').on('lazyLoadError', function(event, slick, image, imageSource){
    callback_error(image[0]);
  });
  $(window).scroll(function(){
      if(!$('#video').hasClass('load_video'))
      {
        $('#video').addClass('load_video');
        $('.load_video').load( "ajax/video.php");
      }
  });
  $(window).scroll(function(){
    var cach_top = $(window).scrollTop();
    var heaigt_header = $('#header').height();

    if(cach_top >= heaigt_header){
      $('#menu_mobi .header').addClass('fiesc');
    }else{
      $('#menu_mobi .header').removeClass('fiesc');
    }
  });
  $(window).scroll(function(){
    var cach_top = $(window).scrollTop();
    var heaigt_header = $('#header').height();

    if(cach_top >= heaigt_header){
      $('.head').addClass('fiedx1');
    }else{
      $('.head').removeClass('fiedx1');
    }
  });
});
