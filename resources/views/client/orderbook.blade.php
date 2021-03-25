@extends('client.layout')

@section('content')
<!-- contact form -->
<section class="w3l-contacts-12 py-5">
    <div class="container py-md-3">
        <div class="contacts12-main">
            <div class="title-section">
                <h3 class="main-title-w3 mb-md-5 mb-4">Đặt sách</h3>
            </div>
            <form action="{{ route('postOrder') }}" method="POST">
                {{ csrf_field() }}
                <div class="main-input">
                    <input type="text" name="name" placeholder="Họ tên của bạn" class="contact-input" required="" />
                    <input type="number" name="phone" placeholder="Số điện thoại liên lạc" class="contact-input"
                        required="" />
                        <input type="text" name="address" placeholder="Địa chỉ nhận sách" class="contact-input" required="" />
                        <textarea class="contact-textarea contact-input" name="note"
                        placeholder="Ghi chú thông tin đặt hàng" required=""></textarea>
                        <div class="flex-container">
  <div style="background-image: url('public/assets/images/g1.jpg');background-size: cover;height: 150px; width: 150px"></div>
  <div  style="background-image: url('public/assets/images/g2.jpg');background-size: cover;height: 150px; width: 150px"></div>
  <div  style="background-image: url('public/assets/images/g3.jpg');background-size: cover;height: 150px; width: 150px" ></div>  
  <div  style="background-image: url('public/assets/images/g4.jpg');background-size: cover;height: 150px; width: 150px"></div>
  <div  style="background-image: url('public/assets/images/g5.jpg');background-size: cover;height: 150px; width: 150px"></div>
</div>
                </div>
                <br/>
                <div class="text-right">
                    <button class="btn-primary btn primary-btn-style">Gửi thư</button>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- //contact form -->
<script>

</script>
@endsection
