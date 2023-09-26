<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="public/assets/css/head_foot.css" />
  <title>Trang chủ</title>
</head>

<body>
  <div id="main">
    <header>
      <div class="header">
        <div class="left">
          <p>Sale all product</p>
        </div>
        <div class="mid">
          <a href="">
            <img src="public/assets/img/logo.png" alt="cái logo đây nè" /></a>
        </div>
        <ul class="right">
          <li>
            <a href="" class="nhunnhin">
              <i class="fa-solid fa-magnifying-glass"></i>
            </a>
          </li>
          <li>
            <a href="" class="nhunnhin">
              <i class="fa-solid fa-bell"></i>
              <span class="number_annou">0</span>
            </a>
          </li>
          <li>
            <a href="" class="nhunnhin">
              <i class="fa-solid fa-bag-shopping"></i>
              <span class="number_annou">0</span>
            </a>
          </li>
          <li>
            <a href="" class="head_user">
              <i class="fa-regular fa-circle-user"></i>
            </a>
          </li>
        </ul>
      </div>
      <div class="sub_header">
        <ul class="nav">
          <li><a href="">About Us</a></li>
          <li>
            <a href="" class="isSubnav">Sản phẩm<i class="fa-solid fa-angle-down down_btn"></i></a>
            <ul class="nav_list_item">
              <li><a href="">Tất cả</a></li>
              <li><a href="">Sản phẩm mới</a></li>
              <li>
                <a href="">Quần</a>
              </li>
              <li>
                <a href="">Áo</a>
              </li>
              <li>
                <a href="">Phụ kiện</a>
              </li>
            </ul>
          </li>
          <!-- <li><a href="">Giảm giá</a></li> -->
          <li><a href="">Bộ sưu tập</a></li>
          <li><a href="">Liên hệ</a></li>
          <li>
            <a href="" class="isSubnav">Chăm sóc khách hàng
              <i class="fa-solid fa-angle-down down_btn"></i></a>
            <ul class="nav_list_item">
              <li><a href="">Đổi trả & bảo hành</a></li>
              <li><a href="">Chính sách vận chuyển</a></li>
              <li><a href="">Hỏi và đáp</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </header>
    <div id="container">
        <?php
            if (!isset($subcontent)){
                $subcontent =[];
            }
            $this -> render($content, $subcontent);
        ?>
    </div>
    
    <h2>Footer</h2>
    <script src="https://kit.fontawesome.com/0a44fda8eb.js" crossorigin="anonymous"></script>
</body>
</html>