@extends('client.layout')

@section('content')
<!-- contact form -->
<section class="w3l-contacts-12 py-5">
    <div class="container py-md-3">
        <div class="contacts12-main">
            <div class="title-section">
                <h3 class="main-title-w3 mb-md-5 mb-4">Gửi thư cho cô Búp Bê</h3>
            </div>
            <form action="{{ route('postContact') }}" method="POST">
                {{ csrf_field() }}
                <div class="main-input">
                    <input type="text" name="name" placeholder="Họ tên của bạn" class="contact-input" required="" />
                    <input type="email" name="email" placeholder="Email của bạn" class="contact-input" required="" />
                    <input type="number" name="phone" placeholder="Số điện thoại liên lạc" class="contact-input"
                        required="" />
                    <textarea class="contact-textarea contact-input" name="content"
                        placeholder="Thông tin bạn cần chia sẻ" required=""></textarea>
                    <div class="input-file-container">
                        <input class="input-file" id="myFile" name="myFile" type="file">
                        <label tabindex="0" for="my-file" class="input-file-trigger">Tải file lên...</label>
                    </div>
                    <p class="file-return"></p>
                </div>
                <div class="text-right">
                    <button class="btn-primary btn primary-btn-style">Gửi thư</button>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- //contact form -->
<script>
    document.querySelector("html").classList.add('js');

    var fileInput = document.querySelector(".input-file"),
        button = document.querySelector(".input-file-trigger"),
        the_return = document.querySelector(".file-return");

    button.addEventListener("keydown", function (event) {
        if (event.keyCode == 13 || event.keyCode == 32) {
            fileInput.focus();
        }
    });
    button.addEventListener("click", function (event) {
        fileInput.focus();
        return false;
    });
    fileInput.addEventListener("change", function (event) {
        the_return.innerHTML = this.value;
    });
</script>
@endsection
