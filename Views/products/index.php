<ul class="tag_comeback">
    <li><a href="<?php echo _WEB_ROOT ?>">Trang chủ</a></li>
    <?php
      if (isset($_GET['collection'])){
        $collection = $_GET['collection'];
        echo "<li>&#47;</li>";
        echo "<li><a href='"._WEB_ROOT."'>Bộ sưu tập</a></li>";
        echo "<li>&#47;</li>";
        echo "<li><a href=''>$collection</a></li>";
      }else if (isset($_GET['find'])){
        $find = $_GET['find'];
        echo "<li>&#47;</li>";
        echo "<li><a href='"._WEB_ROOT."'>Tìm kiếm</a></li>";
        echo "<li>&#47;</li>";
        echo "<li><a href=''># $find</a></li>";
      }else if (isset($_GET['category'])){
        $category = $_GET['category'];
        echo "<li>&#47;</li>";
        echo "<li><a href='"._WEB_ROOT."/product'>Sản phẩm</a></li>";
        echo "<li>&#47;</li>";
        echo "<li><a href=''>$category</a></li>";
      }else{
        echo "<li>&#47;</li>";
        echo "<li><a href=" . _WEB_ROOT.'/product' . ">Sản phẩm</a></li>";
      }
    ?>


</ul>
<div class="content">
  <div class="filter_sort">
    <div class="filter">
      <span class="title">Bộ lọc</span>
      <select class="choosen">
        <option value="">Tất cả</option>
        <?php
          foreach ($categorys as $category) {
            echo "<option value='$category'>$category</option>";
          }
        ?>
        
      </select>
    </div>
    <div class="sort">
      <span class="title">Sắp xếp</span>
      <select class="choosen">
        <option value="ten">A - Z</option>
        <option value="thoigian desc">Mới nhất</option>
        <option value="daban desc">Phổ biến</option>
        <option value="gia">Giá thấp nhất</option>
        <option value="gia desc">Giá cao nhất</option>
      </select>
    </div>
  </div>
  <div class="list_product">
    <div class="product_section">
        <!-- ------------------------- -->
      <!-- <div class="product_card">
        <a href="product/detail?id=">
          <div class="product_img">
            <img class="before" src="./access/img/product/aopolotruoc.jpg" alt="" />
            <img src="./access/img/product/aopolosau.jpg" alt="" class="after" />
          </div>
          <div class="card_content">
            <h5 class="product_name">
              áo thun polo nam mua từ Mỹ về không có bán rẻ được
            </h5>
            <p class="product_price">210.723<span>vnđ</span></p>
          </div>
        </a>
      </div> -->
      <!-- ------------------ -->
    </div>
    <div class="loading_btn"><a href="">xem thêm</a></div>

  </div>
  <section class="none-found_product">
    <div class="not-found">Không tìm thấy sản phẩm nào!</div> 
  </section>
  </div>
</div>