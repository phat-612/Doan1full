<div class="authen-form">
    <div class="auth-form_content">
        <div class="auth-form_header">
        <h2 class="auth-form_heading">đăng ký tài khoản</h2>
        </div>
        <form action="/doan1full/api/signup" method="post" class="auth-form_form">
        <div class="auth-form_group">
            <input type="text" name="hoten" id="ten" placeholder="Họ và tên" class="auth-form_input" required>
        </div>
        <div class="auth-form_group">
            <input type="email" name="email" id="email" placeholder="Email" class="auth-form_input" required>
        </div>
        <div class="auth-form_group">
            <input type="tel" name="sodienthoai" id="phone" minlength="10" maxlength="10" placeholder="Số điện thoại"
            class="auth-form_input" required>
        </div>
        <div class="auth-form_group">
            <input type="date" name="ngaysinh" id="sn" placeholder="Ngày sinh" class="auth-form_input" required>
        </div>
        <div class="auth-form_group">
            <input type="password" name="matkhau" id="pass" placeholder="Mật khẩu" class="auth-form_input" required>
        </div>
        <div class="auth-form_group">
            <input type="password" name="repass" id="repass" placeholder="Xác nhận mật khẩu" class="auth-form_input"
            required>
            <p class="error"></p>
        </div>
        <div class="auth-form_group">
            <input type="checkbox" name="policy" value="yes" id="policy" required="" class="auth-form_policy-check">
            <label class="auth-form_policy-text" for="policy">
            Tôi đồng ý với các điều khoản và chính sách bảo mật
            </label>
        </div>
        <input type="text" name="otp" id="otp" hidden>
        <div class="auth-form_controls">
            <button class="btn js_btn_dk">Đăng ký</button>
        </div>
        </form>
    </div>
</div>
<div class="modal js_otp">
<div class="modal_overplay"></div>
<div class="modal_body-center">
    <div class="modal_body_content">
    <h2 class="title">Xác thực mã OTP</h2>
    <p class="describe">Vui lòng nhập mã OTP vừa được gửi đến hộp thư của bạn</p>
    <div class="otp_input">
        <input type="text" maxlength="1" />
        <input type="text" maxlength="1" />
        <input type="text" maxlength="1" />
        <input type="text" maxlength="1" />
        <input type="text" maxlength="1" />
        <input type="text" maxlength="1" />
    </div>
    <div class="inf_otp">
        <div class="send_again">
        <a href="" class="send">Gửi lại mã</a><span class="again">(1:00)</span>
        </div>
        <p class="time">Thời gian:<span class="time_out">3:00</span></p>
    </div>
    <div class="button_otp">
        <div class="cancel btn_css2"><a href="">Hủy bỏ</a></div>
        <div class="acpt btn_css"><a href="">Xác nhận</a></div>
    </div>
    </div>
</div>
</div>