$(document).ready(function () {
    $('.ipk-slide-out').sidenav();
    $('.user-icon').dropdown({ hover: false, constrainWidth: false });
    $('#' + $('.ipk-tab.active')[0].dataset.id).addClass('active');
});
$(document).on("click", ".ipk-tab", function () {
    $('.ipk-tab.active').removeClass('active');
    $('.menu-item.active').removeClass('active');
    $(this).addClass('active');
    $('#' + $(this).data('id')).addClass('active');
});
$(".parent-item").on({
    mouseenter: function () {
        $(this).parent().children('.list-sub-item')[0].classList.toggle('active');
    },
    mouseleave: function () {
        $(this).parent().children('.list-sub-item')[0].classList.remove('active');
    }
});