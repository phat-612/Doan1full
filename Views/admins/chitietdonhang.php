<form action="" class="Billing-Infor-form">
  <input type="text" name="iddonhang" id="iddonhang" value="<?= $order['id']?>" hidden>
        <header>Chi Tiết Đơn Hàng</header>
        <div class="mother-box">
          <div class="Infor-form">
            <div class="name act">
              <div><label for="name-input">Tên :</label></div>
              <div>
                <p><?php echo $order['hoten']?></p>
              </div>
            </div>
            <div class="location act">
              <div><label for="name-input">Địa Chỉ :</label></div>
              <div>
                <p><?php echo $order['diachi']?></p>
              </div>
            </div>
            <div class="P-number act">
              <div><label for="name-input">Số Điện Thoại:</label></div>
              <div>
                <p><?php echo $order['sodienthoai']?></p>
              </div>
            </div>
            <div class="status act">
              <div><label for="status-select">Trạng Thái</label></div>
              <div>
                <select name="" id="status-select">
                  <option value="chờ xử lý" <?= $order['trangthai'] =='chờ xử lý' ? 'selected' : ''?> >Chờ Xử Lý</option>
                  <option value="đang giao hàng" <?= $order['trangthai'] =='đang giao hàng' ? 'selected' : ''?>>Đang Giao Hàng</option>
                  <option value="bị hủy" <?= $order['trangthai'] =='bị hủy' ? 'selected' : ''?>>Bị Hủy</option>
                  <option value="hoàn thành" <?= $order['trangthai'] =='hoàn thành' ? 'selected' : ''?>>Hoàn Thành</option>
                </select>
              </div>
            </div>
            <div class="note">
              <div><label for="note-area">Ghi Chú</label></div>
              <div class="note-area-box">
                <textarea
                  class="note-area"
                  name=""
                  id="note-area"
                  list-item
                  disabled
                ><?php echo $order['ghichu']?></textarea
                >
              </div>
            </div>
          </div>
          
          <div class="list-item">
          <?php 
           foreach ($order['chitietdonhang'] as $value) {
          ?>
            <div class="li-item">
              <div class="li-img">
                <img
                  src="<?php echo _WEB_ROOT.'/'.$value['hinhanh']?>"
                  alt=""
                />
              </div>
              <div class="li-item-right">
                <div class="li-name"><a href="<?php echo _WEB_ROOT.'/product/detail?id='.$value['id'] ?>"><?php echo $value['ten'] ?></a></div>
                <div class="li-describe">
                 Màu sắc:<?php echo $value['mausac']?> / Kích Thước:<?php echo $value['kichthuoc']?> / Số Lượng:<?php echo $value['soluong'] ?>
                </div>
              </div>
              <div class="li-price"><?php echo $value['gia'] ?></div>
            </div>
            <?php } ?>
          </div>
        </div>
      </form>