<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo _WEB_ROOT?>/public/assets/css/sanpham.css" />
    <link rel="stylesheet" href="<?php echo _WEB_ROOT?>/public/assets/css/permanent.css" />
    <link
      href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css"
      rel="stylesheet"
    />
    <title>Document</title>
  </head>
  <body>
    <script src="../javacript/sanpham.js"></script>
    <div>
      <div class="taskbar">
        <div class="logo-img"><img src="/hinh anh/logo.png" alt="logo" /></div>
        <div class="flex-box">
          <div class="flex">
            <a href="http://127.0.0.1:5500/html/trangchu.html">Trang chủ</a>
          </div>
          <div class="flex">></div>
          <div class="flex">
            <a href="http://127.0.0.1:5500/html/sanpham.html">Sản Phẩm</a>
          </div>
        </div>
      </div>
      <div class="taskbar-menu">
        <ul>
          <li class="taskbar-item">
            <a href="http://127.0.0.1:5500/html/trangchu.html">TRANG CHỦ</a>
          </li>
          <li class="taskbar-item">
            <a href="http://127.0.0.1:5500/html/sanpham.html">SẢN PHẨM</a>
          </li>
          <li class="taskbar-item">
            <a href="http://127.0.0.1:5500/html/donhang.html">ĐƠN HÀNG</a>
          </li>
        </ul>
      </div>
      <?php
            if (!isset($subcontent)){
                $subcontent =[];
            }
            $this -> render($content, $subcontent);
        ?>
      <div class="footer">
        <div class="contact">contact: blablablabla@gmail.com</div>
      </div>
    </div>
  </body>
</html>
