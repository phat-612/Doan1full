
<div class="slider">
    <div class="slider_img">
        <?php 
            foreach ($sliders as $slider) {
                echo "<img class='img_slider_js' src='$slider' alt='ảnh slider' />";
            }
        ?>
    </div>
</div>
<div class="product">
<h2 class="product_heading">sản phẩm nổi bật</h2>
<div class="product_section">
    <?php
        foreach ($products as $product) {
    ?>
        <div class="product_card">
        <a href="product/detail?id=<?php echo $product['id']?>">
            <div class="product_img">
            <img class="before" src="<?php echo isset($product['hinhanh'][0])?$product['hinhanh'][0]:'public/assets/img/products/aothuntruoc.jpg';?>" alt="Ảnh sản phẩm" />
            <img src="<?php echo isset($product['hinhanh'][1])?$product['hinhanh'][1]:'public/assets/img/products/aothunsau.jpg'; ?>" alt="Ảnh sản phẩm" class="after" />
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
<div class="loading_btn"><a href="<?php echo _WEB_ROOT?>/product">xem thêm</a></div>