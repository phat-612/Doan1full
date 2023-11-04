    <ul class="tag_comeback">
<li><a href="">Trang chủ</a></li>
<li>&#47;</li>
<li><a href="">Thanh toán</a></li>
</ul>
<div class="main_wrap">
<div class="left_wrap">
    <section>
    <h1 class="sec_title">thông tin giao hàng</h1>
    <form action="" class="js_form_order">
        <div class="form_pay">
        <div class="row">
            <input type="text" name="khachhang[hoten]" class="form" placeholder="Họ và tên" value="" required>
        </div>
        <div class="row_2">
            <input type="email" name="khachhang[email]" class="form" placeholder="Email" value="" required>
        </div>
        <div class="row_2">
            <input type="tel" name="khachhang[sodienthoai]" pattern="^\d{10}$" class="form valid_phone"
            placeholder="Số điện thoại" value="" required>
        </div>
        <div class="row">
            <input type="text" name="khachhang[diachi]" class="form" placeholder="Địa chỉ chi tiết" value="" required>
        </div>
        <div class="row">
            <textarea name="ghichu" id="note" placeholder="Ghi chú" rows="4" cols="100"></textarea>
        </div>
        <!-- <div class="row">
            <input type="checkbox" name="" id="cach_tra">
            <label for="cach_tra">Thanh toán khi nhận hàng</label>
        </div> -->
        </div>
        <div class="pay2_btn btn_css js_btn_order">
        <input type="submit" name="" id="" value="Đặt hàng"></div>
        <!-- <a href="">thanh toán</a> -->
    </form>
    </section>
</div>
<div class="right_wrap">
    <section>
    <h1 class="sec_title">giỏ hàng</h1>
    <div class="container_product"></div>


    <!-- <div class="nd_giohang">
        <div class="photo_product">
            <img src="./access/img/product/aothuntruoc.jpg" alt="">
        </div>
        <div class="cont_bag">
        <div class="card_title">
            <h1 class="title_product">áo thun đẹp hết nước chấm</h1>
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
            <p class="num_price">200000<span>vnđ</span></p>
        </div>
        </div>
        </div>
    </div> -->




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
    <!-- thông báo đặt hàng -->
<div class="modal">
<div class="congratulate">
    <div class="modal_main">
    <div class="hinhanh">
        <img src="<?php echo _WEB_ROOT?>/public/assets/img/core/congratulation.png" alt="">
    </div>
    <p>đặt hàng thành công</p>
    </div>
</div>
</div>