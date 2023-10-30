<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="<?php echo _WEB_ROOT?>/public/assets/css/user/head_foot.css" />
  <?php 
    if (is_array($css)){
      foreach ($css as $value) {
        echo "<link rel='stylesheet' href='"._WEB_ROOT."/public/assets/css/user/$value.css' />";
      }
    } else{
      echo "<link rel='stylesheet' href='"._WEB_ROOT."/public/assets/css/user/$css.css' />";
    }
  ?>
  <title><?php echo $title ?></title>
</head>

<body>
  <div id="main">
    <header>
      <div class="header">
        <div class="left">
          <p>Sale all product</p>
        </div>
        <div class="mid">
          <a href="<?php echo _WEB_ROOT?>">
            <img src="<?php echo _WEB_ROOT?>/public/assets/img/core/logo.png" alt="cái logo đây nè" /></a>
        </div>
        <ul class="right">
          <li>
            <a href="" class="search_btn">
              <input type="text" placeholder="Tìm kiếm" />
              <i class="fa-solid fa-magnifying-glass"></i>
            </a>
          </li>
          <li>
            <a href="" class="nhunnhin">
              <i class="fa-solid fa-bell"></i>
              <span class="number_annou">0</span>
            </a>
          </li>
          <li class="js_cart">
            <a href="" class="nhunnhin">
              <i class="fa-solid fa-bag-shopping"></i>
              <span class="js_nb_cart number_annou">0</span>
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
          <li><a href="">Thông tin cửa hàng</a></li>
          <li>
            <a href="<?php echo _WEB_ROOT?>/product" class="isSubnav">Sản phẩm<i class="fa-solid fa-angle-down down_btn"></i></a>
            <ul class="nav_list_item">
              <li><a href="">Tất cả</a></li>
              <li><a href="">Sản phẩm mới</a></li>
              <?php print_r($_SESSION)?>
              <!-- <li>
                <a href="">Quần</a>
              </li>
              <li>
                <a href="">Áo</a>
              </li> -->
            </ul>
          </li>
          <li>
            <a href="">Bộ sưu tập</i></a>
          </li>
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
    <footer id="footer">
      <ul class="card_footer lien_he">
        <li>
          <h2>liên hệ</h2>
        </li>
        <li>
          <p>Thứ Hai - Chủ Nhật</p>
          <p>10:00 ~ 21:30</p>
        </li>
        <li>
          <p>Hotline</p><a href="tel:0123456789">0123456789</a>
        </li>
        <li>
          <p>Email</p><a href="mailto:Evilsoulcustomercare@gmail.com">Evilsoulcustomercare@gmail.com</a>
        </li>
      </ul>
      <ul class="card_footer">
        <li>
          <h2>hệ thống cửa hàng</h2>
        </li>
        <li>
          <p>256 phường An Hòa, quận Ninh Kiều, TPCT</p>
        </li>
        <li>
          <p>khu 2 đường 3/2, phường Xuân Khánh, quận Ninh Kiều, TPCT</p>
        </li>
      </ul>
      <ul class="card_footer">
        <li>
          <h2>danh mục sản phẩm</h2>
        </li>
        <li><a href="">Tất cả</a></li>
        <li><a href="">Sản phẩm mới</a></li>
        <li><a href="">Quần</a></li>
        <li><a href="">Áo</a></li>
      </ul>
      <ul class="card_footer">
        <li>
          <h2>hỗ trợ</h2>
        </li>
        <li><a href="">Chính sách vận chuyển</a></li>
        <li><a href="">Chính sách bảo hành</a></li>
        <li><a href="">Chính sách khiếu nại</a></li>
        <ul class="listic_footer">
          <li><a href=""><i class="fa-brands fa-facebook"></i></a></li>
          <li><a href=""><i class="fa-brands fa-instagram"></i></a></li>
          <li><a href=""><i class="fa-brands fa-tiktok"></i></a></li>
        </ul>
      </ul>
      <ul class="card_footer">
        <li>
          <h2>tra cứu lịch sử mua hàng</h2>
        </li>
        <li><input type="email" placeholder="Nhập email" required>
          <button class="send_btn">gửi</button>
        </li>
      </ul>
    </footer>
  </div>
  <div class="bg_shopping_bag">
    <div class="shopping_bag">
      <div class="header_sbag">
        <h1>giỏ hàng</h1>
        <div class="close_btn"><i class="fa-solid fa-xmark"></i></div>
      </div>
      <hr>
      <div class="cont_sbag">
        <div class="list_card">
          <div class="empty_sbag">
            <img src="./access/img/bag/empty_cart.webp" alt="">
            <p>Không có sản phẩm nào trong giỏ hàng</p>
          </div>
          <div class="value_sbag">
            <!-- Đừng có xóaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->
            <!-- <div class="card_item">
              <div class="photo_product">
                <img src="./access/img/product/aothuntruoc.jpg" alt="">
              </div>
              <div class="cont_right">
                <div class="card_title_dlt">
                  <h1 class="title_product">áo thun đẹp hết nước chấm</h1>
                  <span class="js_dlt_pro dlt_product">xóa</span>
                </div>
                <div class="detail_product">
                  <span class="size">Size <span>M</span></span>
                  <span class="color">&#47; Màu <span>trắng</span></span>
                </div>
                <div class="amount_price">
                  <div class="amount">
                    <div class="js_minus amount_icon"><i class="fa-solid fa-minus"></i></div>
                    <div><input type="number" class="myInput" value="1" min="0" idctsp="12"></div>
                    <div class="js_plus amount_icon"><i class="fa-solid fa-plus"></i></div>
                  </div>
                  <div class="price_item">
                    <span class="num_price">200000</span>
                    <span>vnđ</span>
                  </div>
                </div>
              </div>
            </div> -->
            
          </div>
        </div>
      </div>
      <hr>
      <div class="card_sub">
        <div class="pay_card">
          <div class="price">
            <span class="title">tổng</span>
            <div class="total_pay">
              <span class="num_price">0</span>
              <span>vnđ</span>
            </div>
          </div>
          <button class="pay_btn js_btn_pay">thanh toán</button>
        </div>
      </div>
    </div>
  </div>
  <!-- js icon -->
  <script src="https://kit.fontawesome.com/0a44fda8eb.js" crossorigin="anonymous"></script>
  <script src="<?php echo _WEB_ROOT?>/public/assets/js/user/header.js"></script>
  <?php 
    if(isset($js)){
      if (is_array($js)){
        foreach ($js as $value) {
          echo "<script src='"._WEB_ROOT."/public/assets/js/user/$value.js'></script>";
        }
      } else {
        echo "<script src='"._WEB_ROOT."/public/assets/js/user/$js.js'></script>";
      }
    }
  ?>
</body>

</html>