<div class="slider">
    <div class="slider_img">
        <img src="./access/img/Slider/slider2.jpg" alt="" />
    </div>
</div>
<div class="product">
<h2 class="product_heading">sản phẩm nổi bật</h2>
<div class="product_section">
    <?php
        foreach ($products as $product) {
    ?>
        <div class="product_card">
        <a href="/sanpham/chitietsanpham?id=<?php echo $product['id']?>">
            <div class="product_img">
            <img class="before" src="<?php echo $product['hinhanh'][0]?>" alt="Ảnh sản phẩm" />
            <img src="<?php echo $product['hinhanh'][1]?>" alt="Ảnh sản phẩm" class="after" />
            </div>
            <div class="card_content">
            <h5 class="product_name"><?php echo $product['ten']?></h5>
            <p class="product_price"><?php echo $product['gia']?><span>vnđ</span></p>
            </div>
        </a>
        </div>
    <?php } ?>
</div>
</div>
<div class="loading_btn"><a href="">xem thêm</a></div>