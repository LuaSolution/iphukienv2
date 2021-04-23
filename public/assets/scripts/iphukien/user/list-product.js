let chooseProduct;
$(document).ready(function () {
    $.each($(".product .img"), function (index, value) {
        value.style.height = value.offsetWidth + "px"
    })
    $.each($(".product"), function (index, value) {
        let cHeight = value.offsetHeight + 60
        value.style.height = cHeight + "px"
    })
    var elems = document.querySelectorAll('#quickview')
    M.Modal.init(elems, {
        'onOpenEnd': initCarouselModal
    })

    function initCarouselModal() {
        $(".ipk-preloader").removeClass('hide')
        var url = localStorage.getItem('quickview_url')
        $.post(url, {
            _token: localStorage.getItem('quickview_token')
        }).done(function (data) {
                let productInfo = JSON.parse(data)
                // console.log(productInfo)
                let str = ''
                let strColor = ''
                str += '<a href="#!" class="previous"></a>'
                for (i = 0; i < productInfo['listImage'].length; i++) {
                    str += `<div class="carousel-item product-img ${productInfo['wishlist'] ? 'added-wishlist' : ''}" data-img="${productInfo['listImage'][i]}">`
                        + `<span class="sale-percent">-${Math.round((productInfo['product']['price'] - productInfo['product']['sale_price']) / productInfo['product']['price'] * 100)}%</span>`
                        + `<img src="${productInfo['listImage'][i]}" />`
                        + `</div>`
                }
                if(productInfo['listImage'].length == 0) {
                    str += `<div class="carousel-item product-img ${productInfo['wishlist'] ? 'added-wishlist' : ''}" data-img="${localStorage.getItem('quickview_image_base_path') + '/assets/images/header/logo.svg'}">`
                        + `<span class="sale-percent">-${Math.round((productInfo['product']['price'] - productInfo['product']['sale_price']) / productInfo['product']['price'] * 100)}%</span>`
                        + `<img src="${localStorage.getItem('quickview_image_base_path') + '/assets/images/header/logo.svg'}" />`
                        + `</div>`
                }
                str += '<a href="#!" class="next"></a>'
                $("#slider-image").html(str)
                var elems = document.querySelectorAll('.quickview-slider')
                M.Carousel.init(elems, { 'fullWidth': true, indicators: true })

                $("#quickview-name").html(productInfo['product']['name'])

                $("#quickview-short-description").html(productInfo['product']['short_description'])

                switch (productInfo['product']['tag_id']) {
                    case 11:
                        str = `<span class="tag hang-moi"></span>`
                        break
                    case 12:
                        str = `<span class="tag ban-chay"></span>`
                        break
                    case 13:
                        str = `<span class="tag giam-gia"></span>`
                        break
                }
                $("#quickview-list-tag").html(str)

                $("#quickview-origin").html(numberWithCommas(productInfo['product']['price']))

                $("#quickview-sale").html(`${numberWithCommas(productInfo['product']['sale_price'])}đ <span>Giảm ${Math.round((productInfo['product']['price'] - productInfo['product']['sale_price']) / productInfo['product']['price'] * 100)}%</span>`)

                switch (productInfo['product']['status_id']) {
                    case 11:
                        str = `<span class="status het-hang"></span>`
                        break
                    case 12:
                        str = `<span class="status dat-truoc"></span>`
                        break
                    case 13:
                        str = `<span class="status con-hang"></span>`
                        break
                }
                $("#quickview-status").html(str)

                // console.log(productInfo['listChildProduct'])
                strSize = ""
                strColor = ""
                for (i = 0; i < productInfo['listChildProduct'].length; i++) {
                    strSize += `<span class="size"`
                            + `data-sizename="${productInfo['listChildProduct'][i]['product']['size_name']}"`
                            + `data-sizeid="${productInfo['listChildProduct'][i]['product']['size_id']}"`
                            + `>`
                            + `${productInfo['listChildProduct'][i]['product']['size_name']}`
                            + `</span>`
                    strColor += `<span class="color"`
                            + `data-colorname="${productInfo['listChildProduct'][i]['product']['color_name']}"`
                            + `data-colorid="${productInfo['listChildProduct'][i]['product']['color_id']}"`
                            + `>`
                            + `${productInfo['listChildProduct'][i]['product']['color_name']}`
                            + `</span>`
                }
                if(productInfo['listChildProduct'].length == 0) {
                    strSize += `<span class="size" `
                        + `data-sizename="One Size"`
                        + `data-sizeid="-1"`
                        + `>`
                        + `One Size`
                        + `</span>`
                    strColor += `<span class="color" `
                        + `data-colorname="One Color"`
                        + `data-colorid="-1"`
                        + `>`
                        + `One Color`
                        + `</span>`
                }
                $("#quickview-sizes").html(strSize)
                $("#quickview-colors").html(strColor)

                // set for card
                localStorage.setItem('quickview_sale_price', productInfo['product']['sale_price'])
                localStorage.setItem('quickview_product_name', productInfo['product']['name'])
                localStorage.setItem('quickview_nhanh_product_id', productInfo['product']['product_id_nhanh'])

                $(".ipk-preloader").addClass('hide')
            })
    }
})
$(document).on("click", ".color", function () {
    $('.color').removeClass('active');
    $(this).addClass('active');
    if($('.size.active').length > 0) {
        let sizeId = $('.size.active')[0].dataset.sizeid;
        let colorId = $('.color.active')[0].dataset.colorid;
        $.ajax({
            url: localStorage.getItem('quickview_get_child_product_url'),
            type: 'get',
            data: { 
                'productId': localStorage.getItem('quickview_product_id'), 
                'colorId': colorId, 
                'sizeId': sizeId, 
                '_token': localStorage.getItem('quickview_token') 
            }
        }).done(function (data) {
            chooseProduct = JSON.parse(data);
            console.log(chooseProduct);
            if(chooseProduct.product != null) {
                $('#quickview-name').html(chooseProduct.product.name);
                $("#quickview-origin").html(numberWithCommas(chooseProduct.product.price) + 'đ');
                $("#quickview-sale").html(numberWithCommas(chooseProduct.product.sale_price) + 'đ');
                let cImg = chooseProduct.image;
                for(let i = 0; i < $('.product-img').length; i++) {
                    if($('.product-img')[i].dataset.img == cImg) {
                        $('.quickview-slider').carousel('set', i);
                        break;
                    }
                }
            } else {
                M.toast({
                    html: 'Sản phẩm không tồn tại',
                    classes: 'add-cart-fail'
                })
            }
            
        })
        .fail(function () {
            M.toast({
                html: 'Sản phẩm không tồn tại',
                classes: 'add-cart-fail'
            })
        })
    }
});
$(document).on("click", ".size", function () {
    $('.size').removeClass('active');
    $(this).addClass('active');
    if($('.color.active').length > 0) {
        let sizeId = $('.size.active')[0].dataset.sizeid;
        let colorId = $('.color.active')[0].dataset.colorid;
        $.ajax({
            url: localStorage.getItem('quickview_get_child_product_url'),
            type: 'get',
            data: { 
                'productId': localStorage.getItem('quickview_product_id'), 
                'colorId': colorId, 
                'sizeId': sizeId, 
                '_token': localStorage.getItem('quickview_token') 
            }
        }).done(function (data) {
            chooseProduct = JSON.parse(data);
            console.log(chooseProduct);
            if(chooseProduct.product != null) {
                $('#quickview-name').html(chooseProduct.product.name);
                $("#quickview-origin").html(numberWithCommas(chooseProduct.product.price) + 'đ');
                $("#quickview-sale").html(numberWithCommas(chooseProduct.product.sale_price) + 'đ');
                let cImg = chooseProduct.image;
                for(let i = 0; i < $('.product-img').length; i++) {
                    if($('.product-img')[i].dataset.img == cImg) {
                        $('.quickview-slider').carousel('set', i);
                        break;
                    }
                }
            } else {
                M.toast({
                    html: 'Sản phẩm không tồn tại',
                    classes: 'add-cart-fail'
                })
            }
            
        })
        .fail(function () {
            M.toast({
                html: 'Sản phẩm không tồn tại',
                classes: 'add-cart-fail'
            })
        })
    }
})
$(document).on("click", ".quickview-slider .previous", function () {
    $('.quickview-slider').carousel('prev')
})
$(document).on("click", ".quickview-slider .next", function () {
    $('.quickview-slider').carousel('next')
})
$(document).on("click", ".decrease", function () {
    if ($('.quantity').val() == 0) return
    let newQuantity = parseInt($('.quantity').val()) - 1
    $('.quantity').val(newQuantity)
})
$(document).on("click", ".increase", function () {
    let newQuantity = parseInt($('.quantity').val()) + 1
    $('.quantity').val(newQuantity)
})
$(document).on("click", ".quickview-btn", function () {
    localStorage.setItem('quickview_url', $(this).data('url'))
    localStorage.setItem('quickview_product_id', $(this).data('productid'))
    localStorage.setItem('quickview_token', $(this).data('token'))
    localStorage.setItem('quickview_image_base_path', $(this).data('imagepath'))
    localStorage.setItem('quickview_get_child_product_url', $(this).data('getchildproducturl'))
    
})
function updateCart() {
    let listSizeElement = $(".sizes .size.active");
    if(listSizeElement.length == 0) {
        M.toast({
            html: 'Vui lòng chọn màu sác - kích thước',
            classes: 'add-cart-fail'
        })
        return false;
    }
    let listColorElement = $(".colors .color.active");
    if(listColorElement.length == 0) {
        M.toast({
            html: 'Vui lòng chọn màu sác - kích thước',
            classes: 'add-cart-fail'
        })
        return false;
    }
    if(chooseProduct) {
        console.log(chooseProduct)
        let productid = chooseProduct.product.id;
        let choosenSize = $('.sizes .size.active')[0].dataset.sizename;
        let choosenColor = $('.colors .color.active')[0].dataset.colorname;
        let price = chooseProduct.product.sale_price;
        let nhanhProductId = chooseProduct.product.product_id_nhanh;
        let img = chooseProduct.image;
        let prodName = chooseProduct.product.name;
        let quantity = $("#quantity").val() == 0 ? 1 : $("#quantity").val();
        let cart = localStorage.getItem('ipk_cart') ? JSON.parse(localStorage.getItem('ipk_cart')) : {};
        
        if(cart[productid]) {
            cart[productid].quantity = parseInt(cart[productid].quantity) + parseInt(quantity);
        } else {
            cart[productid] = {
                color: choosenColor,
                size: choosenSize,
                quantity: quantity,
                salePrice: price,
                image: img,
                name: prodName,
                nhanhPorductId: nhanhProductId,
            };
        }
        localStorage.setItem('ipk_cart',  JSON.stringify(cart));
        return true;
    } else {
        M.toast({
            html: 'Sản phẩm không tồn tại',
            classes: 'add-cart-fail'
        })
    }
}
$(document).on("click", ".buy-now-btn", function () {
    if (!updateCart()) return

    window.location.href = $(this).data('url')
})
$(document).on("click", ".add-to-card-btn", function () {
    let updateRes = updateCart()
    if (updateRes) {
        M.toast({
            html: 'Cập nhật giỏ hàng thành công',
            classes: 'add-cart-success'
        })
    }
})