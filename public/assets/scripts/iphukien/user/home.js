$(document).ready(function () {
    $.each($(".img-wrapper"), function (index, value) {
        value.style.height = value.offsetWidth + "px";
    });
    $.each($(".item-image"), function (index, value) {
        value.style.height = value.offsetWidth + "px";
    });
    $('.sale-product-slider').carousel({ fullWidth: true });
    $.each($(".partners img"), function (index, value) {
        let top = 55 - value.offsetWidth / 2;
        value.style.marginTop = top + "px";
    });
});
$(document).on("click", ".ipk-next-slide", function () {
    $('.sale-product-slider').carousel('next');
});