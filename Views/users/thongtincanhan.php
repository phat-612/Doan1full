<div class="acc_infor">
    <div class="auth-form_content">
        <form action="" method="post" class="auth-form_form">
            <div class="auth-form_group">
                <label for="ten">Họ và tên:</label>
                <input type="text" name="ten" id="ten" placeholder="Họ và tên"
                    class="auth-form_input" required>
            </div>
            <div class="auth-form_group">
                <label for="mail">Email:</label>
                <input type="email" name="mail" id="mail" placeholder="Email"
                    class="auth-form_input" required>
            </div>
            <div class="auth-form_group">
                <label for="phone">Số điện thoại:</label>
                <input type="tel" name="phone" id="phone" minlength="10" maxlength="10"
                    placeholder="Số điện thoại" class="auth-form_input" required>
            </div>
            <div class="auth-form_group">
                <label for="sn">Ngày sinh:</label>
                <input type="date" name="sn" id="sn" placeholder="Ngày sinh"
                    class="auth-form_input" required>
            </div>
            <div class="auth-form_group">
                <label for="sex">Giới tính:</label>
                <select name="sex" id="user-sex" class="auth-form_select">
                    <option value="0">Không</option>
                    <option selected="" value="1">Nam</option>
                    <option value="2">Nữ</option>
                </select>
            </div>
            <div class="auth-form_controls">
                <button class="btn sp_btn">Lưu</button>
            </div>
        </form>
    </div>
</div>