<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo _WEB_ROOT?>/public/assets/css/admin/admin.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
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
    <title><?php echo $title ?></title>
</head>

<body>
    <div class="big-form">
        <div class="taskbar">
            <div class="logo-img">
              <img src="<?php echo _WEB_ROOT?>/public/assets/img/core/logo.png" alt="logo" />
            </div>  
            <div class="log-out">
                <a href="<?php echo _WEB_ROOT ?>/admin/logout">Đăng Xuất</a>
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
                    <a href="<?php echo _WEB_ROOT ?>/admin/danhmuc">THÊM DANH MỤC</a>
                </li>
                <li class="taskbar-item">
                    <a href="<?php echo _WEB_ROOT ?>/admin/banner">BANNER</a>
                </li>
            </ul>
        </div>
        <?php
            if (!isset($subcontent)){
                $subcontent =[];
            }
            $this -> render($content, $subcontent);
        ?>
    </div>
    <script src="<?= _WEB_ROOT?>/public/assets/js/admin/admin.js"></script>
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