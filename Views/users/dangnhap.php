<div class="authen-form">
    <div class="auth-form_content">
        <div class="auth-form_header">
            <h2 class="auth-form_heading">đăng nhập</h2>
        </div>
        <form action="" method="post" class="auth-form_form">
            <div class="auth-form_group">
                <input type="email" name="email" id="mail" placeholder="Email" class="auth-form_input"
                    required>
            </div>
            <div class="auth-form_group">
                <input type="password" name="pass" id="pass" placeholder="Mật khẩu" class="auth-form_input"
                    required>
            </div>
            <div class="auth-form_group">
                <p class="goto_signup">Bạn chưa có tài khoản?<a href="<?php echo _WEB_ROOT?>/user/signup">Đăng ký</a></p>
                <input type="checkbox" name="save" value="yes" id="luu"
                    class="auth-form_policy-check">
                <label class="auth-form_policy-text" for="luu">
                    Lưu tài khoản
                </label>
            </div>
            <div class="auth-form_controls">
                <a href="" class="forget">Quên mật khẩu ?</a>
                <button type="submit" class="btn">Đăng nhập</button>
            </div>
        </form>
    </div>
</div>
<div class="modal">
    <div class="modal_overplay"></div>
    <div class="modal_body-center">
        <div class="modal_body_content">
            <h2 class="auth-form_heading">Nhập địa chỉ email của bạn</h2>
            <input type="email" name="mail" id="mail" placeholder="Email" class="auth-form_input" required>
            <button class="btn">Gửi</button>
        </div>
    </div>
</div>