$(document).ready(function () {
    $.each($(".product .img"), function (index, value) {
        value.style.height = value.offsetWidth + "px";
    });
    $.each($(".product"), function (index, value) {
        let cHeight = value.offsetHeight + 60;
        value.style.height = cHeight + "px";
    });
    var elems = document.querySelectorAll('#quickview');
    M.Modal.init(elems, {
   		'onOpenEnd': initCarouselModal
   });

    function initCarouselModal() {
        var elems = document.querySelectorAll('.quickview-slider');
        var instances = M.Carousel.init(elems, {'fullWidth': true, indicators: true});
        instances[0].set(2);
    }
});
$(document).on("click", ".color", function () {
    $('.color').removeClass('active');
    $(this).addClass('active');
});
$(document).on("click", ".size", function () {
    $('.size').removeClass('active');
    $(this).addClass('active');
});
$(document).on("click", ".quickview-slider .previous", function () {
    $('.quickview-slider').carousel('prev');
});
$(document).on("click", ".quickview-slider .next", function () {
    $('.quickview-slider').carousel('next');
});
$(document).on("click", ".decrease", function () {
    if($('.quantity').val() == 0) return;
    $('.quantity').val(parseInt($('.quantity').val()) - 1)
});
$(document).on("click", ".increase", function () {
    $('.quantity').val(parseInt($('.quantity').val()) + 1)
});
