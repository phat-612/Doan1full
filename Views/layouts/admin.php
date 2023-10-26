<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo _WEB_ROOT?>/public/assets/css/admin/admin.css" />
    <!-- set css cho trang web -->
    <?php 
    if (is_array($css)){
      foreach ($css as $value) {
        echo "<link rel='stylesheet' href='"._WEB_ROOT."/public/assets/css/admin/$value.css' />";
      }
    } else{
      echo "<link rel='stylesheet' href='"._WEB_ROOT."/public/assets/css/admin/$css.css' />";
    }
  ?>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" />
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
                    <a href="<?php echo _WEB_ROOT ?>/admin">TRANG CHỦ</a>
                </li>
                <li class="taskbar-item">
                    <a href="<?php echo _WEB_ROOT ?>/admin/product">SẢN PHẨM</a>
                </li>
                <li class="taskbar-item">
                    <a href="<?php echo _WEB_ROOT ?>/admin/order">ĐƠN HÀNG</a>
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
    <?php 
    if(isset($js)){
      if (is_array($js)){
        foreach ($js as $value) {
          echo "<script src='"._WEB_ROOT."/public/assets/js/admin/$value.js'></script>";
        }
      } else {
        echo "<script src='"._WEB_ROOT."/public/assets/js/admin/$js.js'></script>";
      }
    }
  ?>

</body>

</html>