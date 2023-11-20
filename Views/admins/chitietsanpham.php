<form action="" class="AddProduct-form">
        <div class="title-box">
          <div class="title-ADDPRODUCT">
              <header>Chi Tiết Sản Phẩm</header>
            </div>
            <div>
                <a href="editProduct?id=<?= $_GET['id'] ?>">Chỉnh Sửa</a>
            </div>
      </div>
      <div class="mother-box-Add-Product">
        <div id="hideField">
          <span>Bộ Sưu Tập</span>
          <span onclick="hideField()">Đóng</span>
          <ul>
            <?php
                foreach ($product['bosuutap'] as $value) {
              ?>
                <li><?= $value ?></li>
            <?php } ?>
            
          </ul>
        </div>
          <div class="General-Information-box">
            <header style="width: 100%; text-align: center">
              Thông tin chung
            </header>
            <div class="Product-Name-box">
              <label class="Product-Name" for="Product-Name"
                >Tên sản phẩm *</label
              >
              <input
                spellcheck="false"
                class="input-text-ProductName"
                type="text"
                id="Product-Name"
                placeholder="Nhập tên sản phẩm"
                disabled
                value="<?= $product['ten'] ?>"
                
              />
            </div>
            <div class="Product-Category-box">
              <label class="Product-Category" for="Product-Category"
                >Danh mục sản phẩm *</label
              >
              <select
                class="Product-Category-select"
                name="Product-Category"
                id="Product-Category"
                disabled
              >
                <option selected value="Danh-Mục"><?= $product['danhmuc'] ?></option>
              </select>
            </div>
            <div class="Product-Price-box">
              <div class="Product-Price-Nametag">
                <label for="Product-Price">Giá Sảm Phẩm *</label>
              </div>
              <input
                spellcheck="false"
                class="Product-Price-input"
                type="text"
                name="Product-Price"
                min="0"
                oninput="validity.valid||(value='');"
                id="Product-Price"
                placeholder="Nhập giá sản phẩm"
                value="<?= number_format($product['gia'], 0, ' ', ' ') ?>"
                disabled
              />
            </div>
            <div class="Product-colection-box" onclick="showField()">
              <label for="" class="Product-colection-nametag">Bộ Sưu Tập</label>
              <label for="colection" id="name-checkbox">Có Bộ Sưu Tập</label>
              <input type="checkbox" name="" id="colection" checked disabled>
            </div>
            <div class="Product-Description-box">
              <label class="Product-Description" for="Product-Description"
                >Mô tả sản phẩm</label
              >
              <textarea
                spellcheck="false"
                class="Product-Description-textarea"
                placeholder="Nhập mô tả sản phẩm"
                name=""
                id="Product-Description"
                cols="30"
                rows="10"
                disabled
              ><?= $product['mota'] ?></textarea>
            </div>
          </div>
          <div class="Meta-Data-box">
            <header style="width: 100%; text-align: center">
              Chi tiết sản phẩm
            </header>
            
              <table>
                <thead>
                    <td>Màu</td>
                    <td>Kích Thước</td>
                    <td>Số lượng</td>
                </thead>
                <tbody>
                  <?php
                    foreach ($product['chitietsanpham'] as $value) {
                  ?>
                  <tr>
                    <td><?= $value['mausac'] ?></td>
                    <td><?= $value['kichthuoc'] ?></td>
                    <td><?= $value['soluong'] ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            
          </div>
          <div class="AddProduct-img">
            <header style="width: 100%; text-align: center">
              Ảnh sản Phẩm
            </header>
            <div class="displayImg">
              <?php
                foreach ($product['hinhanh'] as $value) {
              ?>
                <img src="<?= _WEB_ROOT . '/' . $value ?>" alt="">
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
      </form>