<div class="card_login">
    <form action="api/sendOtp" method="post">
        <h2>Lịch sử mua hàng</h2>
        <div class="row_form">
            <i class="fa-solid fa-key otp"></i>
            <input type="text" name="otp" id="inp_otp" placeholder="Nhập mã OTP">
            <button class="btn_otp">Gửi lại OTP</button>
        </div>
        <p class="error_message">Sai OTP hoặc OTP hết hiệu lực</p>
        <button class="submit" type="submit">Tiếp tục</button>
    </form>
</div>