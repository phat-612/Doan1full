<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/css/admin/login.css">
  <title>Document</title>
</head>
<body>
    <form class="login" method="POST" action="<?php echo _WEB_ROOT?>/admin/login">
      <h1>Đăng Nhập</h1>
      <p class="error"></p>
      <div class="account">
        <label for="account">Tên Đăng Nhập:</label>
        <input type="text" name="email" id="account" placeholder="Tên Đăng Nhập" />
      </div>
      <div class="password">
        <label for="password">Mật Khẩu:</label>
        <input type="password" name="pass" id="" placeholder="Nhập Mật Khẩu" />      </div>
      <div class="btn-box">
        <button type="submit">Đăng Nhập</button>
      </div>
    </form>
    <script src="<?php echo _WEB_ROOT ?>/public/assets/js/admin/dangnhap.js"></script>
</body>
</html>
