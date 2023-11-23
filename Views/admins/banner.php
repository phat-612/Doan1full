<form action="<?= _WEB_ROOT?>/api/updateBanner" method="post" class="banner-form" enctype="multipart/form-data">
      <h1>THÊM ẢNH</h1>
      <div class="drag-area">
        <input type="file" id="upload" name="hinhanh[]" multiple />
        <div class="displayImg" id="displayImg">
          <div class="old-displayImg" id="old-displayImg">
            <?php
              foreach ($banners as $value) {
            ?>
              <div class="box">
                <input type="text" name="old_img[]" id="" value="<?= $value ?>" hidden>
                <img src="<?= _WEB_ROOT.'/'.$value ?>" alt="">
                <button onclick="deleteOldImg(event)">xóa</button>
              </div>
            <?php } ?>
            
          </div>
          <div class="new-displayImg" id="new-displayImg"></div>
        </div>
      </div>
    <div class="btn-box"><button>Lưu</button></div>
    </form>