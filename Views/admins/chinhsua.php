<form action="" class="AddProduct-form" enctype="multipart/form-data">
  <input type="text" name="id" id="id" value="<?= $product['id'] ?>" hidden>
        <div class="title-ADDPRODUCT">
          <header>SỬA SẢN PHẨM</header>
        </div>
        <div class="mother-box-Add-Product">
          <div class="General-Information-box">
            <header>Thông tin chung</header>
            <div class="Product-Name-box">
              <label class="Product-Name" for="Product-Name"
                >Tên sản phẩm *</label
              >
              <input
                spellcheck="false"
                class="input-text-ProductName"
                type="text"
                id="Product-Name"
                name="ten"
                placeholder="Nhập tên sản phẩm"
                value="<?= $product['ten'] ?>"
                required
              />
            </div>
            <div class="Product-Category-box">
              <label class="Product-Category" for="Product-Category"
                >Danh mục sản phẩm *</label
              >
              <select
                class="Product-Category-select"
                name="iddanhmuc"
                id="Product-Category"
                required
              >
                <?php foreach($_SESSION['category'] as $value){
                  $id = $value['id'];
                  $ten = $value['danhmuc'];
                  $selected = $product['danhmuc'] == $ten ? 'selected' : '';
                  echo "<option value='$id' $selected>$ten</option>";
                } 
                ?>
                
              </select>
            </div>
            <div class="Product-Price-box">
              <div class="Product-Price-Nametag">
                <label for="Product-Price">Giá Sảm Phẩm *</label>
              </div>
              <input
                spellcheck="false"
                class="Product-Price-input"
                type="number"
                name="gia"
                min="0"
                oninput="validity.valid||(value='');"
                id="Product-Price"
                placeholder="Nhập giá sản phẩm"
                value="<?= $product['gia'] ?>"
                required
              />
            </div>
            <div class="colection-box">
              <div class="colect_name">Bộ Sưu Tập</div>
              <label for="chooseBST">Có bộ sưu tập</label>
              <input type="checkbox" id="chooseBST" <?= $product['bosuutap'] ? 'checked' : '' ?>/>
            </div>
            <div class="Product-Description-box">
              <label class="Product-Description" for="Product-Description"
                >Mô tả sản phẩm</label
              >
              <textarea
                spellcheck="false"
                class="Product-Description-textarea"
                placeholder="Nhập mô tả sản phẩm"
                name="mota"
                id="Product-Description"
                cols="30"
                rows="10"
              ><?= $product['mota'] ?></textarea>
            </div>
          </div>
          <div class="Meta-Data-box">
            <div class="header-meta">
              <header style="width: 100%; text-align: center">
                Chi tiết sản phẩm
              </header>
            </div>

            <div class="field">
              <div class="color-box">
                <label class="color-nametag" for="color">Màu</label>
                <div class="color">
                  <select class="color-select" name="" id="color">
                    <option value="">Chọn màu</option>
                    <?php
                      foreach ($_SESSION['color'] as $color) {
                        $ten = $color['mausac'];
                        $id = $color['id'];
                        echo "<option value='$id'>$ten</option>";
                      }
                    ?>
                  </select>
                </div>
              </div>
              <div class="size-box">
                <label class="size-nametag" for="size">Size</label>
                <select class="size-select" name="" id="size">
                  <option value="">Chọn size</option>
                  <?php
                    foreach ($_SESSION['size'] as $size) {
                      $ten = $size['kichthuoc'];
                      $id = $size['id'];
                      echo "<option value='$id'>$ten</option>";
                    }
                  ?>
                </select>
              </div>
              <div class="quantity-box">
                <label class="quantity-nametag" for="quantity">số lượng</label>
                <input
                  class="quantity-input"
                  type="number"
                  id="quantity"
                  min="0"
                  oninput="validity.valid||(value='');"
                />
              </div>
              <button
                type="button"
                id="btn-lappy"
                class="btn btn-success"
                onclick="addOnClick()"
              >
                Thêm
              </button>
            </div>
            <div class="scroll">
              <div class="container">
                <div id="table"></div>
              </div>
            </div>
          </div>
          <div class="AddProduct-img">
            <header style="width: 100%; text-align: center">
              Thêm ảnh sản Phẩm
            </header>
            <div class="drag-area">
              <div class="bor-upload"><input type="file" name="hinhanh[]" id="upload" multiple /></div>
              <div id="displayImg">
                <!-- ảnh sản phẩm -->
                <div class="old_img_area">
                <?php
                  foreach ($product['hinhanh'] as $value) {
                ?>
                  <div class="border-img">
                    <input type="text" name="old_img[]" id="" value="<?= $value ?>" hidden>
                    <img src="<?= _WEB_ROOT . '/' . $value ?>" alt="">
                    <button onclick="deleteOldImg(event)">Xóa</button>
                  </div>
                <?php } ?>
                </div>
                <div class="new_img_area">

                </div>
              </div>
            </div>
          </div>
          <div class="save-bt"><button type="submit">Lưu</button></div>
        </div>
        <div class="colect_hide-box-form">
          <span id="closeBST">X Đóng</span>
          <h3>Chọn Bộ Sưu Tập:</h3>
          <?php
            foreach ($_SESSION['collection'] as $collection) {
              $ten = $collection['bosuutap'];
              $id = $collection['id'];
              ?>
              <div>
                <input type="checkbox" name="bosuutap[]" id="bst<?= $id?>" class="collection-checkbox" value="<?= $ten ?>" <?= in_array($ten, $product['bosuutap']) ? 'checked' : '' ?>/>
                <label for="bst<?= $id?>">
                  <?= $ten ?>
                </label>
              </div>
          <?php }?>
        </div>
      </form>