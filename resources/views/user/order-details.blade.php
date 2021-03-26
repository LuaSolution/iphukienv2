@extends('layouts.app')

@section('title', 'Chi tiết đơn hàng #1234')

@section('header')
@include('layouts.header', ['status' => 'complete'])
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('public/iphukien/user/order-details.css') }}">
@endsection

@section('content')
<div class="ipk-container">
    <div class="ipk-content-container order-details-container">
        <div class="notify-text">Miễn phí giao hàng cho đơn hàng tối thiểu 1 tỉ đồng</div>
        <div class="user-infos">
            <div class="avatar" style="background-image: url({{ asset('public/assets/images/demo/avatar.jpg') }})"></div>
            <div class="info">
                <div class="name">FlatCloud Company</div>
                <div class="email">dinhbao@flatcloud.company</div>
            </div>
            <a class="logout-link" href="#!">
                Đăng xuất
            </a>
        </div>
        <div class="order-code">ĐƠN HÀNG #26v734285</div>
        <div class="list-status">
            <div class="status finish"><span>Chưa xác nhận</span></div>
            <div class="status current"><span>Khách hủy</span></div>
            <div class="status"><span>Đã xác nhận</span></div>
            <div class="status"><span>Đang đóng gói</span></div>
            <div class="status"><span>Đang giao hàng</span></div>
            <div class="status"><span>Thành công</span></div>
        </div>
        <?php $data = config('app.nhanh_api_user_name') . '14742630';
            $checksum = md5(md5(config('app.nhanh_api_secret_key') . $data) . $data);
            $src = "https://dev.nhanh.vn/api/shipping/trackingframe?apiUsername=" . config('app.nhanh_api_user_name') . "&orderId=14742630&checksum=" . $checksum;
            ?>
        <iframe src="{{$src}}"  width="100%" height="600"></iframe>
        <!-- <div class="detail-table">
            <table class="responsive-table">
                <thead>
                    <tr>
                        <th>Log ID</th>
                        <th>Ngày tạo</th>
                        <th>Người tạo</th>
                        <th>Hành động</th>
                        <th>Trạng thái</th>
                        <th>Ghi chú</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>12345</td>
                        <td>2021-11-03 12:45:15</td>
                        <td><a href="">Nguyễn văn A</a></td>
                        <td>Hãng vận chuyển cập nhật trạng thái đơn hàng sang thành công</td>
                        <td>Đang chuyển -> Thành công</td>
                        <td>Hãng vận chuyển cập nhật trạng thái đơn hàng sang thành công. Hãng vận chuyển cập nhật trạng
                            thái đơn hàng sang thành công. Hãng vận chuyển cập nhật trạng thái đơn hàng sang thành công.
                            Hãng vận chuyển cập nhật trạng thái đơn hàng sang thành công.</td>
                    </tr>
                    <tr>
                        <td>12345</td>
                        <td>2021-11-03 12:45:15</td>
                        <td><a href="">Nguyễn văn A</a></td>
                        <td>Hãng vận chuyển cập nhật trạng thái đơn hàng sang thành công</td>
                        <td>Đang chuyển -> Thành công</td>
                        <td>Hãng vận chuyển cập nhật trạng thái đơn hàng sang thành công. Hãng vận chuyển cập nhật trạng
                            thái đơn hàng sang thành công. Hãng vận chuyển cập nhật trạng thái đơn hàng sang thành công.
                            Hãng vận chuyển cập nhật trạng thái đơn hàng sang thành công.</td>
                    </tr>
                    <tr>
                        <td>12345</td>
                        <td>2021-11-03 12:45:15</td>
                        <td><a href="">Nguyễn văn A</a></td>
                        <td>Hãng vận chuyển cập nhật trạng thái đơn hàng sang thành công</td>
                        <td>Đang chuyển -> Thành công</td>
                        <td>Hãng vận chuyển cập nhật trạng thái đơn hàng sang thành công. Hãng vận chuyển cập nhật trạng
                            thái đơn hàng sang thành công. Hãng vận chuyển cập nhật trạng thái đơn hàng sang thành công.
                            Hãng vận chuyển cập nhật trạng thái đơn hàng sang thành công.</td>
                    </tr>
                    <tr>
                        <td>12345</td>
                        <td>2021-11-03 12:45:15</td>
                        <td><a href="">Nguyễn văn A</a></td>
                        <td>Hãng vận chuyển cập nhật trạng thái đơn hàng sang thành công</td>
                        <td>Đang chuyển -> Thành công</td>
                        <td>Hãng vận chuyển cập nhật trạng thái đơn hàng sang thành công. Hãng vận chuyển cập nhật trạng
                            thái đơn hàng sang thành công. Hãng vận chuyển cập nhật trạng thái đơn hàng sang thành công.
                            Hãng vận chuyển cập nhật trạng thái đơn hàng sang thành công.</td>
                    </tr>
                </tbody>
            </table>
        </div> -->
        <div class="list-products">
            <div class="row products">
                <div class="product col l3">
                    <div class="img" style="background-image: url({{ asset('public/assets/images/demo/ipod.png') }})"></div>
                    <div class="name">Tên của Sản Phẩm này có độ dài là hai dòng như...</div>
                    <div class="price-color">
                        <span class="price">18.200.000đ</span>
                        <span class="color">XS, Xanh lá</span>
                    </div>
                    <div class="quantity">
                        Số lượng<br />
                        01
                    </div>
                </div>
                <div class="product col l3">
                    <div class="img" style="background-image: url({{ asset('public/assets/images/demo/ipod.png') }})"></div>
                    <div class="name">Tên của Sản Phẩm này có độ dài là hai dòng như...</div>
                    <div class="price-color">
                        <span class="price">18.200.000đ</span>
                        <span class="color">XS, Xanh lá</span>
                    </div>
                    <div class="quantity">
                        Số lượng<br />
                        01
                    </div>
                </div>
                <div class="product col l3">
                    <div class="img" style="background-image: url({{ asset('public/assets/images/demo/ipod.png') }})"></div>
                    <div class="name">Tên của Sản Phẩm này có độ dài là hai dòng như...</div>
                    <div class="price-color">
                        <span class="price">18.200.000đ</span>
                        <span class="color">XS, Xanh lá</span>
                    </div>
                    <div class="quantity">
                        Số lượng<br />
                        01
                    </div>
                </div>
                <div class="product col l3">
                    <div class="img" style="background-image: url({{ asset('public/assets/images/demo/ipod.png') }})"></div>
                    <div class="name">Tên của Sản Phẩm này có độ dài là hai dòng như...</div>
                    <div class="price-color">
                        <span class="price">18.200.000đ</span>
                        <span class="color">XS, Xanh lá</span>
                    </div>
                    <div class="quantity">
                        Số lượng<br />
                        01
                    </div>
                </div>
            </div>
        </div>
        <div class="row order-details">
            <div class="col l6 s12 order-detail-left">
                <div class="order-detail-title">Chi tiết đơn hàng</div>
                <div class="left-info receiver-info">Mã đơn hàng: #26v734285</div>
                <div class="left-info">Trạng thái: Đã xác nhận</div>
                <div class="left-info">Ngày đặt hàng: 15-02-2020</div>
                <div class="left-info">Hình thức thanh toán: Momo</div>
                <div class="left-info">Dự kiến nhận hàng: 20-02-2020</div>
                <div class="left-info receiver-info">Người nhận: Rose Charlie</div>
                <div class="left-info">Địa chỉ: 87 đường 17 Linh Trung Thủ Đức</div>
                <div class="left-info">Số điện thoại: 0839 056 021</div>
                <div class="left-info">Email: rosecharlie171297@gmail.com</div>
            </div>
            <div class="col l6 s12 order-detail-right">
                <div class="right-info">
                    <span>Số lượng sản phẩm</span>
                    <span>5</span>
                </div>
                <div class="right-info">
                    <span>Tiền hàng</span>
                    <span>548.000 VNĐ</span>
                </div>
                <div class="right-info">
                    <span>Phí giao hàng</span>
                    <span>50.000 VNĐ</span>
                </div>
                <div class="right-info sum">
                    <span>Tổng cộng</span>
                    <span>598.000 VNĐ</span>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('footer')
@include('layouts.footer', ['status' => 'complete'])
@endsection