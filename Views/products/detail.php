<div id="container">
      <ul class="tag_comeback">
          <li><a href="">Trang chủ</a></li>
          <li>&#47;</li>
          <li><a href="">Sản phẩm</a></li>
          <li>&#47;</li>
          <li><a href=""><?php echo $product['ten']?></a></li>
      </ul>
      <div class="shop">
        <div class="wrap_shop">
          <div class="detail_img">
              <div class="left_img">
                  <div class="left_img_item">
                    <img src="./access/img/product/aopolotruoc.jpg" alt="" class="detail">
                  </div>
                  <div class="left_img_item">
                    <img src="./access/img/product/aopolotruoc.jpg" alt="" class="detail">
                  </div>
                  <div class="left_img_item">
                    <img src="./access/img/product/aopolotruoc.jpg" alt="" class="detail">
                  </div>
                  <div class="left_img_item">
                    <img src="./access/img/product/aopolotruoc.jpg" alt="" class="detail">
                  </div>
                  <div class="left_img_item">
                    <img src="./access/img/product/aopolotruoc.jpg" alt="" class="detail">
                  </div>
                  <div class="left_img_item">
                    <img src="./access/img/product/aopolotruoc.jpg" alt="" class="detail">
                  </div>
              
              </div>
              <div class="main_img">
                  <img src="./access/img/product/aothuntruoc.jpg" alt="">
              </div>
          </div>
          <div class="info_pro">
            <ul class="information">
              <li>
                <h1 class="title_product"><?php echo $product['ten']?></h1>
              </li>
              <li class="price_item">
                <p class="num_price"><?php echo $product['gia']?><span>vnđ</span></p>
              </li>
              <li>
                <p>Màu sắc:</p>
                <div class="choose ccolor">
                  <span class="select color">hồng</span>
                  <span class="select color">trắng</span>
                </div>
              </li>
              <li>
                <p>Size:</p>
                <div class="choose csize">
                  <span class="select size">M</span>
                  <span class="select size">L</span>
                  <span class="select size">XL</span>
                </div>
              </li>
              <li class="amount_price">
                <span>Số lượng:</span>
                <div class="amount">
                  <div class="js_minus amount_icon"><i class="fa-solid fa-minus"></i></div>
                  <div><input type="number" class="myInput" value="1" min="0"></div>
                  <div class="js_plus amount_icon"><i class="fa-solid fa-plus"></i></div>
                </div>
              </li>
              <div class="btn_addbag">
                <button class="pay_btn">Thêm vào giỏ hàng</button>
              </div>
            </ul>
              <!--  info  -->
              <div class="information">
                <div class="detail_info">
                  <div class="head_info">Thông tin<i class="fa-solid fa-chevron-down down_btn"></i></div>
                  <div class="info_main"><?php echo $product['mota']?>
                  </div>
                </div>
              </div>
              <div class="information no_border">
                <div class="detail_info">
                  <div class="head_info">Chọn kích thước
                    <i class="fa-solid fa-chevron-down down_btn"></i>
                  </div>
                  <div class="info_main">
                    <img src="./access/img/bangsize.png" alt="" class="bang_size">
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>