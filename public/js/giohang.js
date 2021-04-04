function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
function eraseCookie(name) {   
    document.cookie = name+'=; Max-Age=-99999999;';  
}


function doAddCart(id,title,slug,img,price,number){
	NProgress.start();
	var shopData = JSON.parse(getCookie('shop'));
	if (shopData == null) {
		shopData = [];
	}

	if ( shopData[id] == undefined || shopData[id] == null) {
		shopData[id] = {
			"title" : title,
			"slug" : slug,
			"img" : img,
			"price" : price,
			"number" : number
		};
	}else{
		shopData[id].number += number;
	}

	setCookie('shop',JSON.stringify(shopData),1);
	updateCart();

	showMsg("success","Thêm sản phẩm "+title+" vào giỏ thành công");
	NProgress.done();

return false;
}

function doAddCartMore(id,title,slug,img,price){
	var number = parseInt($("#qty").val());
	doAddCart(id,title,slug,img,price,number);

}

function showMsg(type,msg){
	 Lobibox.notify(type, {
	size: 'mini',
	msg: msg,
	delay: 3000,
	showClass: 'zoomIn',        // Show animation class.
	hideClass: 'zoomOut',
	});
}

function updateCart(){
	var shopData = JSON.parse(getCookie('shop'));
	if (shopData != null) {
		var total = 0;
		for (var i = 0; i < shopData.length; i++) {
			if ( shopData[i] != null ){
				total += parseInt(shopData[i].number);
			}
		}
		
		$(".num-cart").text(total);
	}
}

function updateBoxShopCart(){
	var shopData = JSON.parse(getCookie('shop'));
	if (shopData == null) {
		shopData = [];
	}
	var priceTotal = 0;
	if (shopData.length > 0) {
		var shopDetail = "";
		
		for (var i = 0; i < shopData.length; i++) {
			if ( shopData[i] != null ){
				priceTotal += shopData[i].price*shopData[i].number;
				shopDetail += '<tr class="cart_detail"> <td width="10%" align="center" class="hidden-xs"> <a target="_blank" href="/san-pham/'+shopData[i].slug+'"><img src="'+shopData[i].img+'" class="img-responsive"/></a> </td><td width="20%"><a class="name" target="_blank" href="/san-pham/'+shopData[i].slug+'">'+shopData[i].title+'</a> </td><td width="10%" align="center"> <div class="price-real">'+numberWithCommas(shopData[i].price)+'</div></td><td width="10%" align="center"> <input onchange="updateCartNumber('+i+', this.value);" type="number" value="'+shopData[i].number+'" maxlength="3" min="1" max="999" size="2" style="text-align:center; border:1px solid #F0F0F0"/>&nbsp; <p class="visible-xs" style="display:none;font-size:15px;">'+numberWithCommas(shopData[i].price*shopData[i].number)+'</p></td><td width="18%" align="center" class="price-total hidden-xs">'+numberWithCommas(shopData[i].price*shopData[i].number)+'</td><td width="10%" align="center"><a href="javascript:updateCartNumber('+i+', 0)" data-toggle="tooltip" title="Xóa"><i class="glyphicon glyphicon-trash"></i></a> </td></tr>';
			}
		}
		$(".cart_detail").remove();
		$("#have-product tbody").prepend(shopDetail);
		$(".all-cart-price").text('Tổng giá: '+numberWithCommas(priceTotal)+' VNĐ');
	}
	if (priceTotal > 0) {
		$("#no-product").hide();
		$("#have-product").fadeIn();
	}else{
		$("#have-product").hide();
		$("#no-product").fadeIn();
	}
	$("input[name='cart']").val(JSON.stringify([shopData]));
}

function clearCart() {
	setCookie('shop',JSON.stringify([]),1);
	updateCart();
	updateBoxShopCart();
}

function updateCartNumber(id, value) {
	var shopData = JSON.parse(getCookie('shop'));
	if (shopData == null) {
		shopData = [];
	}

	if ( shopData[id] == undefined || shopData[id] == null) {

	}else{
		value = parseInt(value);
		if (value <= 0) {
			shopData.splice(id,1);
		}else{
			shopData[id].number = Math.max(value,0);
		}
		
	}

	setCookie('shop',JSON.stringify(shopData),1);
	updateCart();
	updateBoxShopCart();
}

function checkCart() {
	var shopData = JSON.parse(getCookie('shop'));
	if (shopData == null) {
		shopData = [];
	}
	var priceTotal = 0;
	if (shopData.length > 0) {
		var shopDetail = "";
		
		for (var i = 0; i < shopData.length; i++) {
			if ( shopData[i] != null ){
				priceTotal += shopData[i].price*shopData[i].number;
			}
		}
		
	}
	if (priceTotal > 0) {
		return true;
	}else{
		alert("Vui lòng chọn sản phẩm để đặt hàng!");
		return false;
	}

}

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

$(document).ready(function(){
	updateCart();

	if ( $("#box-shopcart").length > 0 ) {
		updateBoxShopCart();
	}
});