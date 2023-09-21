<form action="/<?php echo $GLOBALS['rootPath'] ?>/api/adminLogin" method="post">
    <label for="taikhoan">Tài khoản</label>
    <input type="text" id="taikhoan" name="taikhoan">
    <label for="matkhau">Mật khẩu</label>
    <input type="password" id="matkhau" name="matkhau">
    <button type="submit">Đăng nhập</button>
</form>