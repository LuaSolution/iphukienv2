$(document).on("click", ".address", function () {
    $('.address').removeClass('selected');
    $(this).addClass('selected');
});
$(document).on("click", ".payment-method-item", function () {
    $('.payment-method-item').removeClass('selected');
    $(this).addClass('selected');
});
$(document).on("click", ".delivery-method-item", function () {
    $('.delivery-method-item').removeClass('selected');
    $(this).addClass('selected');
});
$(document).ready(function () {
    var elems = document.querySelectorAll('#new-address-popup');
    M.Modal.init(elems, {"endingTop": '5%'});
    var elems = document.querySelectorAll('select');
    M.FormSelect.init(elems);
});