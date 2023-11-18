<ul class="tag_comeback">
        <li><a href="">Trang chủ</a></li>
        <li>&#47;</li>
        <li><a href="">Thanh toán</a></li>
      </ul>
      <div class="main_wrap">
        <div class="left_wrap">
          <div class="auth-form_content">
            <div class="auth-form_header">
              <h2 class="auth-form_heading">thông tin giao hàng</h2>
            </div>
            <form action="" method="post" class="auth-form_form js_form_order">
              <div class="form_pay">
                <div class="auth-form_group">
                  <input type="text" name="thongtingiaohang[hoten]" id="ten" placeholder="Họ và tên" class="auth-form_input" required>
                </div>
                <div class="auth-form_group row_2">
                  <input type="email" name="mail" id="mail" placeholder="Email" class="auth-form_input" disabled value="<?= isset($_SESSION['email']) ? $_SESSION['email'] : '' ?>">
                </div>
                <div class="auth-form_group row_2">
                  <input type="tel" name="thongtingiaohang[sodienthoai]" id="phone" minlength="10" maxlength="10" placeholder="Số điện thoại"
                    class="auth-form_input" required>
                </div>
                <div class="auth-form_group">
                  <input type="text" name="thongtingiaohang[diachi]" class="auth-form_input" placeholder="Địa chỉ chi tiết" value=""
                    required>
                </div>
                <div class="row">
                  <textarea name="ghichu" id="note" placeholder="Ghi chú" rows="4" cols="100"></textarea>
                </div>
              </div>
              <div class="pay2_btn btn_css">
                <input type="submit" name="" id="" value="Đặt hàng">
              </div>
            </form>
          </div>
        </div>
        <div class="right_wrap">
          <section>
            <h2 class="auth-form_heading">giỏ hàng</h2>
            <div class="container_product">
              <!-- render sản phẩm trong giỏ hàng ra chỗ này -->
            </div>

            <hr>
            <div class="card_sub">
              <div class="pay_card">
                <div class="price thanhtoan_css">
                  <span class="title">tổng</span>
                  <div class="total_pay">
                    <p class="num_price">0<span>vnđ</span></p>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
      <!-- thông báo sau khi đặt hàng -->
      <div class="modal js_check">
        <div class="modal_overplay"></div>
        <div class="modal_body-center">
          <div class="modal_body_content">
            <div class="dp_center js_success">
                <div class="hinhanh">
                <img src="<?php echo _WEB_ROOT?>/public/assets/img/core/congratulation.png" alt="">
                </div>
                <p>đặt hàng thành công</p>
            </div>
          </div>
        </div>
      </div>