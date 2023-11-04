<div class="Product-list-form">
    <header>Danh Sách Sản Phẩm</header>
    <div class="filtering-box">
        <label for="filtering-select">Lọc Sản Phẩm :</label>
        <select name="filtering-select" id="filtering-select" class="js_filPro">
            <option value=''>Tất cả</option>
            <?php
          foreach ($dmPros as $dmPro) {
            echo "<option value='$dmPro'>$dmPro</option>";
          }
        ?>
        </select>
    </div>
    <div class="Sort-box">
        <label for="Sort-select">Sắp Xếp :</label>
        <select name="Sort-select" id="Sort-select" class="js_arrProduct">
            <option value="ten">A->Z</option>
            <option value="ten desc">Z->A</option>
            <option value="gia">Giá Thấp đến Cao</option>
            <option value="gia desc">Giá Cao đến Thấp</option>
        </select>
    </div>
    <div class="Search">
        <span class="icon"><i class="fa fa-search"></i></span>
        <input type="search" id="search" placeholder="Search..." class="js_srPro" />
        <button class="js_butSrPro">tìm</button>
    </div>
    <div class="add-product">
        <a href="<?php echo _WEB_ROOT?>/admin/addProduct">Thêm sản Phẩm</a>
    </div>
    <div class="mother-box">
        <table id="product-table" class="table-box">
            <thead>
                <tr>
                    <th>Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Giá</th>
                </tr>
            </thead>
            <tbody id="product-tbody  ">
                <?php
                if (empty($listProduct)) {
                   echo "Không có sản phẩm";
                } else {    
                    foreach ($listProduct as $product) {?>
                <tr>
                    <td><?= $product['ten']?></td>
                    <td>1</td>
                    <td><?= $product['gia']?></td>
                    <td>
                        <a href="<?= _WEB_ROOT."admin/detailProduct?id=".$product['id']?>">Chi Tiết</a>
                    </td>
                </tr>
                <?php
                    }
                }
                ?>
        </table>
    </div>


    <div id="pagination" class="pagination">
        <ul class="pagination-list">
            <?php   
                $qualProduct = 50;
                $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                $limit = 5;
                $totalPages = ceil($qualProduct / $limit);    
                if ($currentPage > 1) {
                    $backPage = $currentPage - 1;
                    echo "<li><a class='pagination_link' href='?page=$backPage'>&lt;</a></li>";
                }
                if ($currentPage <= 2 && $totalPages >= 5){
                    for ($i = 1; $i <=5; $i++){
                        echo "<li><a class='pagination_link' href='?page=$i'>$i</a></li>";
                    }
                }
                else 
                    if ($currentPage > 2 && $currentPage <= $totalPages) {
                        echo "<li><a class='pagination_link' href='?page=1'>1</a></li>";
                        echo "<li>...</li>";
                            for ($i = $currentPage; $i < $currentPage+4; $i++){
                                echo "<li><a class='pagination_link' href='?page=$i'>$i</a></li>";
                            } 
                        }  
                    else if($currentPage > 2 && $currentPage <= $totalPages) {
                        echo "<li><a class='pagination_link' href='?page=1'>1</a></li>";
                        echo "<li>...</li>";
                        for ($i = $currentPage; $i < $totalPages; $i++){ 
                                echo "<li><a class='pagination_link' href='?page=$i'>$i</a></li>";                     
                        }
                    }
                    if ($currentPage < $totalPages) {   
                        $nextPage = $currentPage +1;
                        echo "<li><a class='pagination_link' href='?page=$nextPage'>&gt;</a></li>";
                }
               
                
            ?>
        </ul>
    </div>
</div>