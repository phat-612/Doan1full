<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo _WEB_ROOT?>/public/assets/css/admin/admin.css" />
    <?php 
    if (is_array($css)){
      foreach ($css as $value) {
        echo "<link rel='stylesheet' href='"._WEB_ROOT."/public/assets/css/admin/$value.css' />";
      }
    } else{
      echo "<link rel='stylesheet' href='"._WEB_ROOT."/public/assets/css/admin/$css.css' />";
    }
  ?>
    <title><?php echo $title ?></title>
  </head>
  <body>
    <div class="big-form">
      <div class="taskbar">
        <div class="logo-img"><img src="<?php echo _WEB_ROOT?>/public/assets/img/logo.png" alt="logo" /></div>
        <div class="flex-box">
          <div class="flex">
            <a href="http://127.0.0.1:5500/html/trangchu.html">Trang chủ</a>
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
          <li class="taskbar-item">
            <a href="http://127.0.0.1:5500/html/danhmuc.html">THÊM DANH MỤC</a>
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
