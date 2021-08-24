@extends('layouts.app')

@section('title', 'Thanh toán')

@section('header')
    @include('layouts.header')
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('public/assets/styles/iphukien/user/payment.css') }}">
@endsection

@section('content')
    <div class="ipk-container payment-container">
        <div class="ipk-content-container">
            <div class="order-infos">
                <div class="address-block-title">
                    <span class="gio-hang">Giỏ hàng</span>
                    <span class="thanh-toan">Thanh toán</span>
                </div>
                <div class="address-block">
                    <div class="title">Địa chỉ đã lưu</div>
                    <div class="sub-title">Chọn địa chỉ để giao hàng tới</div>
                    <div class="list-address">
                        @foreach($addresses as $key => $item)
                            <div class="address {{$item->is_default == 1 ? 'selected' : ''}}"
                                 data-addressid="{{!empty($item->id) ? $item->id : null}}"
                                 data-city="{{!empty($item->city) ? $item->city : null}}"
                                 data-district="{{!empty($item->district) ? $item->district : null}}"
                                 data-ward="{{!empty($item->ward) ? $item->ward : null}}"
                                 data-address="{{!empty($item->address) ? $item->address : null}}"
                                 data-name="{{!empty($item->name) ? $item->name : null}}"
                                 data-email="{{!empty($item->email) ? $item->email : null}}"
                                 data-phone="{{!empty($item->phone) ? $item->phone : null}}"
                            >
                                <div class="address-content">{{!empty($item->address) ? $item->address : null}}</div>
                                <div class="customer-name">{{!empty($item->name) ? $item->name : null}}</div>
                                <div class="customer-phone">{{!empty($item->phone) ? $item->phone : null}}</div>
                                <div class="customer-email">{{!empty($item->email) ? $item->email : null}}</div>
                            </div>
                        @endforeach
                    </div>
                    <div class="add-new-address modal-trigger" data-target="new-address-popup"
                         href="#new-address-popup">
                        + Thêm địa chỉ khác
                    </div>
                    <input type="hidden" id="carrier-id"/>
                    <input type="hidden" id="total-ship-fee-input"/>
                    <input type="hidden" id="delivery-date"/>
                </div>
                <div class="payment-delivery-block">
                    <div class="methods">
                        <div class="methods-title">Hình thức thanh toán</div>
                        <div class="list-method">
                            @foreach($paymentMethods as $key => $item)
                                <div class="method-item payment-method-item {{$key == 0 ? 'selected' : ''}}"
                                     data-paymentmethodid="{{$item->id}}">{{!empty($item->name) ? $item->name : null}}</div>
                            @endforeach
                        </div>
                    </div>
                    <div class="methods">
                        <div class="methods-title">Hình thức vận chuyển</div>
                        <div class="list-method">
                            @foreach($deliveries as $key => $item)
                                <div class="method-item delivery-method-item {{$key == 0 ? 'selected' : ''}}"
                                     data-deliveryid="{{$item->id}}">{{!empty($item->name) ? $item->name : null }}</div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="payment-infos">
                <div class="payment-infos-title">Chi tiết đơn hàng</div>
                <div class="info">
                    <span>Số lượng sản phẩm</span>
                    <span id="total-product"></span>
                </div>
                <div class="info">
                    <span>Tiền hàng</span>
                    <span id="total-goods-price"></span>
                </div>
                <div class="info">
                    <span>Phí giao hàng</span>
                    <span id="total-ship-fee"></span>
                </div>
                <div class="info">
                    <span>Dự kiến nhận hàng</span>
                    <span id="receive-date"></span>
                </div>
                <div class="info sum">
                    <span>Tổng cộng</span>
                    <span id="total-order"></span>
                </div>
            </div>
            <div class="list-button-wrapper">
                <div class="list-button">
                    <a href="{{ url()->previous() }}" class="come-back">Quay trở lại</a>
                    <a href="#!" class="complete">Hoàn tất</a>
                    <div class="sum">
                        <div class="sum-price" id="sum-price"></div>
                        <div class="count-products" id="total-product-footer"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Structure -->
    <div id="new-address-popup" class="modal">
        <div class="modal-content">
            <a href="#!" class="modal-close close-add-address-popup"></a>
            <div class="new-address-popup-title" style="text-transform: uppercase;">
                Thêm địa chỉ mới
            </div>
            <form method="post" action="{{route('user.add-new-address')}}" class="row add-new-address-form">
                {{ csrf_field() }}
                <div class="col m6 s12 form-input">
                    <input type="text" placeholder="HỌ VÀ TÊN *" name="name"/>
                    <span>Vui lòng điền đầy đủ Họ và Tên</span>
                </div>
                <div class="col m6 s12 form-input">
                    <input type="text" placeholder="SỐ ĐIỆN THOẠI *" name="phone"/>
                    <span>Ví dụ: 0866 909 606</span>
                </div>
                <div class="col m6 s12 form-input">
                    <input type="text" placeholder="EMAIL *" name="email"/>
                    <span>Ví dụ: 0866 909 606</span>
                </div>
                <div class="col m6 s12 form-input">
                    <div class="input-field">
                        <input type="text" id="input_province" value="Chọn tỉnh/ thành phố" readonly >
                        <input type="hidden" name="city" id="value_city" value="" readonly >
                        <div id="city">
                            @if(!empty($listCity))
                                @foreach ($listCity as $city)
                                    <span data-value="{{ $city->name }}"
                                            data-cityid="{{ $city->id }}">{{ !empty($city->name) ? $city->name: null }}</span>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col m6 s12 form-input">
                    <div class="input-field">
                        <input type="text" id="input_district" value="Chọn quận/ huyện" readonly >
                        <input type="hidden" name="district" id="value_district" value="" readonly >
                        <div id="district"></div>
                    </div>
                </div>
                <div class="col m6 s12 form-input">
                    <div class="input-field">
                        <input type="text" id="input_ward" value="Chọn phường/ xã" readonly >
                        <input type="hidden" name="ward" id="value_ward" value="" readonly >
                        <div id="ward"></div>
                    </div>
                </div>
                <div class="col m6 s12 form-input">
                    <input type="text" placeholder="SỐ NHÀ/ TÊN ĐƯỜNG *" name="address"/>
                    <span>Ví dụ: 86-88 đường Đinh Tiên Hoàng</span>
                </div>
                <div class="col s12 form-input">
                    <div class="set-default-address">
                        <p>
                            <label>
                                <input type="checkbox" name="default-address" name="is_default"/>
                                <span>Đặt làm địa chỉ mặc định</span>
                            </label>
                        </p>
                    </div>
                </div>
                <div class="col s12 form-input center-align">
                    <button type="submit" value="Cập nhật">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
    <style>
        #input_province, #input_district, #input_ward{
            border-bottom: 0.5px solid;
            position: relative;
            background-image: url("/public/assets/images/icon.svg");
            background-repeat: no-repeat;
            background-position: center right;
            border-bottom: 0.5px solid;
            cursor: pointer;
            margin-bottom: 0;
        }
        #city, #district, #ward{ 
            display: flex;
            flex-direction: column;
            position: relative;
            z-index: 9;
            overflow-y: scroll;
            height: 0;
        }

        .height{
            height: 40vh !important;
        }

        #city > span, #district > span, #ward > span {
            background-color: white;
            border: 0.5px solid #ccc;
            padding: 15px 10px;
            font-size: 14px !important;
        }
    </style>
@endsection

@section('scripts')
    <script>
        $(document).click(function(event) { 
            var $target = $(event.target);
            
            if(!$target.closest('#input_province').length) {
                $('#city').removeClass('height');
            }

            if(!$target.closest('#input_district').length) {
                $('#district').removeClass('height');
            }

            if(!$target.closest('#input_ward').length) {
                $('#ward').removeClass('height');
            }
        });

        $(document).ready(function () {
            $('#input_province').click(function() {
                $('#city').addClass('height');
            })
            
            $('#city span').click(function(event) {
                $('#input_district').val('Chọn quận/ huyện');
                $('#district span').remove();

                $('#input_ward').val('Chọn phường/ xã');
                $('#ward span').remove();
                
                $('#value_district').val('');
                $('#value_ward').val('');

                const cityId = $(this).attr('data-cityid');
                const cityValue = $(this).attr('data-value');
                $.get(
                    "{{ URL::to('/') }}/location/DISTRICT/" + cityId,
                    function (data) {
                        let districts = JSON.parse(data);
                        let dis;
                        let a = '';
                        do {
                            dis = districts.pop();
                            a += '<span data-value="' + dis.name + '" data-districtid="' + dis.id + '">' + dis.name + '</span>';
                        }
                        while (districts.length > 0);
                        $('#district').html(a);
                        $(".ipk-preloader").addClass('hide');
                        $('#input_province').val(cityValue);
                        $('#value_city').val(cityValue);
                    }
                );
            })

            $('#input_district').click(function() {
                if($("#district span").length) {
                    $('#district').addClass('height');
                }
            })

            $(document).on('click', '#district span', function(event) {
                $('#input_ward').val('Chọn phường/ xã');
                $('#ward span').remove();
                $('#value_ward').val('');

                const districtId =  $(this).attr('data-districtid');
                const districtValue =  $(this).attr('data-value');
                $.get(
                    "{{ URL::to('/') }}/location/WARD/" + districtId,
                    function (data) {
                        let wards = JSON.parse(data);
                        let ward;
                        let a = '';
                        do {
                            ward = wards.pop();
                            a += '<span data-value="' + ward.name + '" data-wardid="' + ward.id + '">' + ward.name + '</span>';
                        }
                        while (wards.length > 0);
                        $('#ward').html(a);
                        $('#input_district').val(districtValue);
                        $('#value_district').val(districtValue);
                    }
                );
            })


            $('#input_ward').click(function() {
                if($("#ward span").length) {
                    $('#ward').addClass('height');
                }
            })

            $(document).on('click', '#ward span', function(event) {
                const wardValue =  $(this).attr('data-value');
                $('#input_ward').val(wardValue);
                $('#ward').addClass('height');
                $('#value_ward').val(wardValue);
            })

            
            $(".ipk-preloader").removeClass('hide');
            var elems = document.querySelectorAll('#new-address-popup');
            M.Modal.init(elems, {"endingTop": '5%'});
            var elems = document.querySelectorAll('select');
            M.FormSelect.init(elems);
            if ($('.list-address .address').length > 0) {
                //init address
                if ($('.list-address .address.selected').length == 0) $('.list-address .address').addClass('selected');
                //get init info
                let sum = 0, count = 0;
                let cart = localStorage.getItem('ipk_cart') ? JSON.parse(localStorage.getItem('ipk_cart')) : {};
                let productIds = {};
                for (const i in cart) {
                    sum += cart[i].salePrice * cart[i].quantity;
                    count++;
                    productIds[`${cart[i].nhanhPorductId}`] = cart[i].quantity;
                }
                $("#total-goods-price").html(`${numberWithCommas(sum)} VNĐ`);
                $("#total-product").html(`${count}`);
                $("#total-product-footer").html(`Có ${count} sản phẩm`);
                //free ship
                $.post("{{ route('ajax.calc-shipping-fee') }}", {
                    toCityName: $('.list-address .address.selected').data('city'),
                    toDistrictName: $('.list-address .address.selected').data('district'),
                    codMoney: sum,
                    productIds: productIds,
                    _token: `{{ csrf_token() }}`
                })
                    .done(function (data) {
                        console.log(data);
                        let shipService = JSON.parse(data);
                        let totalShipFee = parseInt(shipService.shipFee) + parseInt(shipService.codFee) + parseInt(shipService.declaredFee);
                        let orderPrice = sum + totalShipFee;

                        // if (sum < 500000) {
                        //     $("#total-ship-fee").html(`${numberWithCommas(totalShipFee)} VNĐ`);
                        // } else {
                            $("#total-ship-fee").html(`0 VNĐ`);
                            orderPrice = sum
                        // }
                        let today = new Date();
                        today.setHours(today.getHours() + shipService.estimatedDeliveryTime);
                        let cYear = today.getFullYear();
                        let cMonth = today.getMonth() <= 8 ? `0${today.getMonth() + 1}` : today.getMonth() + 1;
                        let cDate = today.getDate() <= 9 ? `0${today.getDate()}` : today.getDate();

                        $("#receive-date").html(`${cYear}-${cMonth}-${cDate}`);
                        $("#total-order").html(`${numberWithCommas(orderPrice)} VNĐ`);
                        $("#sum-price").html(`TỔNG ${numberWithCommas(orderPrice)} VNĐ`);
                        $("#carrier-id").val(shipService.carrierId);
                        $("#total-ship-fee-input").val(totalShipFee);
                        $("#delivery-date").val(`${cYear}-${cMonth}-${cDate}`);
                    });
            }
            $(".ipk-preloader").addClass('hide');
        });
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
        // $(document).on("change", "#city", function () {
        //     $(".ipk-preloader").removeClass('hide');
        //     let cityId = $("#city option:selected").data('cityid');
        //     $("#district option").remove();
        //     $.get(
        //         "{{ URL::to('/') }}/location/DISTRICT/" + cityId,
        //         function (data) {
        //             let districts = JSON.parse(data);
        //             let dis;
        //             do {
        //                 dis = districts.pop();
        //                 $("#district").formSelect().append('<option value="' + dis.name + '" data-districtid="' + dis.id + '">' + dis.name + '</option>');
        //             }
        //             while (districts.length > 0);
        //             $("#district").formSelect();
        //             $(".ipk-preloader").addClass('hide');
        //         }
        //     );

        // });
        // $(document).on("change", "#district", function () {
        //     $(".ipk-preloader").removeClass('hide');
        //     let districtId = $("#district option:selected").data('districtid');
        //     $("#ward option").remove();
        //     $.get(
        //         "{{ URL::to('/') }}/location/WARD/" + districtId,
        //         function (data) {
        //             let wards = JSON.parse(data);
        //             let ward;
        //             do {
        //                 ward = wards.pop();
        //                 $("#ward").formSelect().append('<option value="' + ward.name + '" data-wardid="' + ward.id + '">' + ward.name + '</option>');
        //             }
        //             while (wards.length > 0);
        //             $("#ward").formSelect();
        //             $(".ipk-preloader").addClass('hide');
        //         }
        //     );
        // });
        
        $(document).on("click", ".complete", function () {
            $(".ipk-preloader").removeClass('hide');
            let cart = localStorage.getItem('ipk_cart') ? JSON.parse(localStorage.getItem('ipk_cart')) : {};
            let productList = [];
            let obj;
            for (const i in cart) {
                obj = {};
                obj['idNhanh'] = cart[i].nhanhPorductId;
                obj['quantity'] = cart[i].quantity;
                obj['name'] = cart[i].name;
                obj['type'] = 'Product';
                obj['price'] = cart[i].salePrice;
                obj['color'] = cart[i].color;
                obj['size'] = cart[i].size;
                obj['id'] = i;
                obj['image'] = cart[i].image;
                productList.push(obj);
            }
            $.post("{{ route('ajax.create-order') }}", {
                customerCityName: $('.list-address .address.selected').data('city'),
                customerDistrictName: $('.list-address .address.selected').data('district'),
                customerWardLocationName: $('.list-address .address.selected').data('ward'),
                customerAddress: $('.list-address .address.selected').data('address'),
                addressId: $('.list-address .address.selected').data('addressid'),
                customerName: $('.list-address .address.selected').data('name'),
                customerMobile: $('.list-address .address.selected').data('phone'),
                customerEmail: $('.list-address .address.selected').data('email'),
                carrierId: $("#carrier-id").val(),
                customerShipFee: $("#total-ship-fee-input").val(),
                productList: JSON.stringify(productList),
                paymentMethodId: $(".payment-method-item.selected").data("paymentmethodid"),
                deliveryId: $(".delivery-method-item.selected").data("deliveryid"),
                shipFee: $("#total-ship-fee-input").val(),
                deliveryDate: $("#delivery-date").val(),
                _token: `{{ csrf_token() }}`
            })
                .done(function (data) {
                    let res = JSON.parse(data);
                    if (res.code == 1) {
                        localStorage.removeItem("ipk_cart");
                        if (Number(res?.paymentMethodId) > 2) {
                            window.location.href = `{{ URL::to('/') . '/payment/order/' }}${res.orderCode}`;
                        } else {
                            window.location.href = `{{ URL::to('/') . '/payment-complete/' }}${res.orderId}`;
                        }

                    } else {
                        M.toast({
                            html: res.message,
                            classes: 'add-cart-fail'
                        })
                    }
                })
                .fail(function () {
                    alert("error");
                })
                .always(function () {
                    $(".ipk-preloader").addClass('hide');
                });
        });

    </script>
@endsection
