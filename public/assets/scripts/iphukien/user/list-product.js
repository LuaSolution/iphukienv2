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
        $(".ipk-preloader").removeClass('hide');
        var url = localStorage.getItem('quickview_url');
        $.post(url, {
            _token: localStorage.getItem('quickview_token')
        })
            .done(function (data) {
                let productInfo = JSON.parse(data);
                console.log(productInfo)
                let str = '';
                let strColor = '';
                str += '<a href="#!" class="previous"></a>'
                for (i = 0; i < productInfo['productColor'].length; i++) {
                    str += `<div class="carousel-item product-img ${productInfo['wishlist'] ? 'added-wishlist' : ''}">`
                        + `<span class="sale-percent">-${Math.round((productInfo['product']['price'] - productInfo['product']['sale_price']) / productInfo['product']['price'] * 100)}%</span>`
                        + `<img src="${localStorage.getItem('quickview_image_base_path')}/${productInfo['productColor'][i].image}" />`
                        + `</div>`;
                    strColor += `<span class="color" data-img="${localStorage.getItem('quickview_image_base_path')}/${productInfo['productColor'][i].image}">${productInfo['productColor'][i].color_name}</span>`;
                }
                str += '<a href="#!" class="next"></a>';
                $("#slider-image").html(str);
                var elems = document.querySelectorAll('.quickview-slider');
                M.Carousel.init(elems, { 'fullWidth': true, indicators: true });

                $("#quickview-name").html(productInfo['product'].name);

                $("#quickview-short-description").html(productInfo['product'].short_description);

                switch (productInfo['product'].tag_id) {
                    case 11:
                        str = `<span class="tag hang-moi"></span>`;
                        break;
                    case 12:
                        str = `<span class="tag ban-chay"></span>`;
                        break;
                    case 13:
                        str = `<span class="tag giam-gia"></span>`;
                        break;
                }
                $("#quickview-list-tag").html(str);

                $("#quickview-origin").html(numberWithCommas(productInfo['product'].price));

                $("#quickview-sale").html(`${numberWithCommas(productInfo['product'].sale_price)}đ <span>Giảm ${Math.round((productInfo['product']['price'] - productInfo['product']['sale_price']) / productInfo['product']['price'] * 100)}%</span>`);

                switch (productInfo['product'].status_id) {
                    case 11:
                        str = `<span class="status het-hang"></span>`;
                        break;
                    case 12:
                        str = `<span class="status dat-truoc"></span>`;
                        break;
                    case 13:
                        str = `<span class="status con-hang"></span>`;
                        break;
                }
                $("#quickview-status").html(str);

                $("#quickview-colors").html(strColor);

                str = "";
                for (i = 0; i < productInfo['productSize'].length; i++) {
                    str += `<span class="size">${productInfo['productSize'][i].name}</span>`;
                }
                $("#quickview-sizes").html(str);

                $(".ipk-preloader").addClass('hide');
            });
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
    if ($('.quantity').val() == 0) return;
    let newQuantity = parseInt($('.quantity').val()) - 1;
    $('.quantity').val(newQuantity);
    let cart = localStorage.getItem('ipk_cart') ? JSON.parse(localStorage.getItem('ipk_cart')) : {};
    cart[productId].quantity = newQuantity;
    localStorage.setItem('ipk_cart', JSON.stringify(cart));
});
$(document).on("click", ".increase", function () {
    let newQuantity = parseInt($('.quantity').val()) + 1;
    $('.quantity').val(newQuantity);
    let cart = localStorage.getItem('ipk_cart') ? JSON.parse(localStorage.getItem('ipk_cart')) : {};
    cart[productId].quantity = newQuantity;
    localStorage.setItem('ipk_cart', JSON.stringify(cart));
});
$(document).on("click", ".quickview-btn", function () {
    localStorage.setItem('quickview_url', $(this).data('url'));
    localStorage.setItem('quickview_product_id', $(this).data('productid'));
    localStorage.setItem('quickview_token', $(this).data('token'));
    localStorage.setItem('quickview_image_base_path', $(this).data('imagepath'));
})
function updateCart() {
    let listColorElement = $(".colors .color.active");
    if(listColorElement.length == 0) {
        M.toast({
            html: 'Vui lòng chọn màu sắc',
            classes: 'add-cart-fail'
        })
        return false;
    }
    let choosenColor = listColorElement[0].dataset.colorid;
    let choosenColorName = listColorElement[0].dataset.colorname;

    let listSizeElement = $(".sizes .size.active");
    if(listSizeElement.length == 0) {
        M.toast({
            html: 'Vui lòng chọn kích thước',
            classes: 'add-cart-fail'
        })
        return false;
    }
    let choosenSize = listSizeElement[0].dataset.sizeid;
    let choosenSizeName = listSizeElement[0].dataset.sizename;

    let quantity = $("#quantity").val() == 0 ? 1 : $("#quantity").val();

    let cart = localStorage.getItem('ipk_cart') ? JSON.parse(localStorage.getItem('ipk_cart')) : {};
    // console.log(cart);
    if(cart[localStorage.getItem('quickview_product_id')]) {
        cart[localStorage.getItem('quickview_product_id')].quantity = quantity;
    } else {
        cart[localStorage.getItem('quickview_product_id')] = {
            color: choosenColor,
            size: choosenSize,
            quantity: quantity,
            image:$(".colors .color.active").data('img'),
            salePrice: "",
            name: "",
            sizeName: choosenSizeName,
            colorName: choosenColorName,
            nhanhPorductId: ""
        };
    }
    localStorage.setItem('ipk_cart',  JSON.stringify(cart));
    return true;
}
$(document).on("click","#buy-now-btn",function() {
    if(!updateCart()) return;

    window.location.href = $(this).data('url');
});
$(document).on("click",".add-to-card-btn",function() {
    let updateRes = updateCart();
    if(updateRes) {
        M.toast({
            html: 'Cập nhật giỏ hàng thành công',
            classes: 'add-cart-success'
        });
    }
});