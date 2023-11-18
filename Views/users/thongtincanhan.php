<div class="acc_infor">
    <div class="auth-form_content">
        <form action="" method="post" class="auth-form_form">
            <div class="auth-form_group">
                <label for="ten">Họ và tên:</label>
                <input type="text" name="hoten" id="ten" placeholder="Họ và tên"
                    class="auth-form_input" value="<?= $user['hoten']?>" required>
            </div>
            <div class="auth-form_group">
                <label for="mail">Email:</label>
                <input type="email" name="mail" id="mail" placeholder="Email"
                    class="auth-form_input" value="<?= $user['taikhoan']?>" disabled>
            </div>
            <div class="auth-form_group">
                <label for="phone">Số điện thoại:</label>
                <input type="tel" name="phone" id="phone" minlength="10" maxlength="10"
                    placeholder="Số điện thoại" class="auth-form_input" value="<?= $user['sodienthoai']?>" disabled>
            </div>
            <div class="auth-form_group">
                <label for="sn">Ngày sinh:</label>
                <input type="date" name="ngaysinh" id="sn" placeholder="Ngày sinh"
                    class="auth-form_input" value="<?= $user['ngaysinh']?>" required>
            </div>
            <div class="auth-form_group">
                <label for="sex">Giới tính:</label>
                <select name="gioitinh" id="user-sex" class="auth-form_select">
                    <option value="0" <?= $user['gioitinh'] == 0 ? 'selected' : '' ?> >Không</option>
                    <option value="1" <?= $user['gioitinh'] == 1 ? 'selected' : '' ?>>Nam</option>
                    <option value="2" <?= $user['gioitinh'] == 2 ? 'selected' : '' ?>>Nữ</option>
                </select>
            </div>
            <div class="auth-form_controls">
                <button type="submit" name='changeInfo' class="btn sp_btn">Lưu</button>
            </div>
        </form>
    </div>
</div>