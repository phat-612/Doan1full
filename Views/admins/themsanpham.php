<form action="" method="post" class="AddProduct-form">
  <div class="title-ADDPRODUCT">
    <header>THÊM SẢN PHẨM</header>
  </div>
  <div class="mother-box-Add-Product">
    <div class="General-Information-box">
      <header>Thông tin chung</header>
      <div class="Product-Name-box">
        <label class="Product-Name" for="Product-Name">Tên sản phẩm *</label>
        <input spellcheck="false" class="input-text-ProductName" type="text" id="Product-Name"
          placeholder="Nhập tên sản phẩm" required />
      </div>
      <div class="Product-Category-box">
        <label class="Product-Category" for="Product-Category">Danh mục sản phẩm *</label>
        <select class="Product-Category-select" name="Product-Category" id="Product-Category" required>
          <!-- <option value="chọn-danh-mục">chọn danh mục</option> -->
          <?php
            foreach ($_SESSION['category'] as $category) {
              $ten = $category['danhmuc'];
              $id = $category['id'];
              echo "<option value='$id'>$ten</option>";
            }
          ?>
        </select>
      </div>
      <div class="Product-Price-box">
        <div class="Product-Price-Nametag">
          <label for="Product-Price">Giá Sảm Phẩm *</label>
        </div>
        <input spellcheck="false" class="Product-Price-input" type="number" name="Product-Price" min="0"
          oninput="validity.valid||(value='');" id="Product-Price" placeholder="Nhập giá sản phẩm" required />
      </div>
      <div class="colection-box">
        <div class="colect_name">Bộ Sưu Tập</div>
        <label for="chooseBST">Có bộ sưu tập</label>
        <input type="checkbox" id="chooseBST" />
      </div>
      <div class="Product-Description-box">
        <label class="Product-Description" for="Product-Description">Mô tả sản phẩm</label>
        <textarea spellcheck="false" class="Product-Description-textarea" placeholder="Nhập mô tả sản phẩm" name=""
          id="Product-Description" cols="30" rows="10"></textarea>
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
              <!-- <option value="Chọn-màu">Chọn màu</option> -->
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
            <!-- <option value="S">S</option> -->
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
          <label class="quantity-nametag" for="quantity">Số lượng</label>
          <input class="quantity-input" type="number" id="quantity" min="0" oninput="validity.valid||(value='');"/>
        </div>
        <button type="button" id="btn-lappy" class="btn btn-success" onclick="addOnClick()">
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
        <input type="file" name="upload" id="upload" multiple />
        <div id="displayImg"></div>
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
      <input type="checkbox" name="bosuutap[]" id="muaDong" class="collection-checkbox" value="<?= $id ?>" />
      <label for="muaDong"><?= $ten ?></label>
    </div>
    <?php }?>
  </div>
</form>