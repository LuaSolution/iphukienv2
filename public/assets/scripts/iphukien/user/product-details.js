$(document).ready(function () {
    var elems = document.querySelectorAll('#list-image-popup');
    M.Modal.init(elems, {
        'onOpenEnd': calcListThumbsWidth
    });

    function calcListThumbsWidth() {
        let w = $('.thumbs-popup span').length * 122 + ($('.thumbs-popup span').length - 1) * 18;
        $('.thumbs-popup')[0].style.width = w + 'px';
    }

});
$(document).on("click", ".list-thumb-wrapper .up", function () {
    if ($(".thumbs")[0].offsetHeight - $(".thumbs span:not(.hide)")[0].offsetHeight <= 470) return;
    $.each($(".thumbs span"), function (index, value) {
        if (!value.classList.contains('hide')) {
            value.classList.add('hide');
            return false;
        }
    });
});
$(document).on("click", ".list-thumb-wrapper .down", function () {
    if ($(".thumbs span.hide").length == 0) return;
    $(".thumbs span.hide")[$(".thumbs span.hide").length - 1].classList.remove('hide');
});
$(document).on("click", ".color", function () {
    $('.color').removeClass('active');
    $(this).addClass('active');
    $('.main-image')[0].style.backgroundImage = "url(" + $(this).data('img') + ")";
});
$(document).on("click", ".size", function () {
    $('.size').removeClass('active');
    $(this).addClass('active');
});
$(document).on("click", ".decrease", function () {
    if ($('.quantity').val() == 0) return;
    $('.quantity').val(parseInt($('.quantity').val()) - 1)
});
$(document).on("click", ".increase", function () {
    $('.quantity').val(parseInt($('.quantity').val()) + 1)
});
$(document).on("click", ".list-thumbs-popup .arrow-left", function () {
    if ($(".thumbs-popup span.hide").length == 0) return;
    $(".thumbs-popup span.hide")[$(".thumbs-popup span.hide").length - 1].classList.remove('hide');
    let w = $('.thumbs-popup span:not(.hide)').length * 122 + ($('.thumbs-popup span:not(.hide)').length - 1) * 18;
    $('.thumbs-popup')[0].style.width = w + 'px';
    $('.thumbs-popup span:not(.hide)')[1].style.marginLeft = '18px';
});
$(document).on("click", ".list-thumbs-popup .arrow-right", function () {
    if ($(".thumbs-popup")[0].offsetWidth <= $(".thumbs-wrapper-popup")[0].offsetWidth) return;
    $.each($(".thumbs-popup span"), function (index, value) {
        if (!value.classList.contains('hide')) {
            value.classList.add('hide');
            // reset width
            let w = $('.thumbs-popup span:not(.hide)').length * 122 + ($('.thumbs-popup span:not(.hide)').length - 1) * 18;
            $('.thumbs-popup')[0].style.width = w + 'px';
            $('.thumbs-popup span:not(.hide)')[0].style.marginLeft = '0'
            // return
            return false;
        }
    });
});
$(document).on("click", ".thumbs-popup span", function () {
    $('.main-image-popup')[0].style.backgroundImage = "url(" + $(this).data('img') + ")";
});
$(document).on("click", ".thumbs span", function () {
    $('.main-image')[0].style.backgroundImage = "url(" + $(this).data('img') + ")";
});
$(document).on("click", ".custom-fb-share-button", function () {
    $('.fb-share-button').trigger( "click" );
});
$(document).on("click", ".add-to-card-btn", function () {
    M.toast({
        html: 'Thêm vào giỏ hàng thành công',
        classes: 'add-cart-success'
    })
});
