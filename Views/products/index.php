<ul class="tag_comeback">
    <li><a href="">Trang chủ</a></li>
    <li>&#47;</li>
    <li><a href="">Sản phẩm</a></li>
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
        
        <!-- <option value="quần">Quần</option> -->
      </select>
    </div>
    <div class="sort">
      <span class="title">Sắp xếp</span>
      <select class="choosen">
        <option value="ten">Tên </option>
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
</div>