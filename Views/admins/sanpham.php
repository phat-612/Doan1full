<?php
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 8; 
    $totalPages = ceil($qualProduct / $limit);
    if ($currentPage < 1 || $currentPage > $totalPages) {
        header("Location: ?page=1");
        exit();     
    }
?>

<div class="Product-list-form">
    <header>Danh Sách Sản Phẩm</header>
    <div class="filtering-box">
        <label for="filtering-select">Lọc Sản Phẩm :</label>
        <select name="filtering-select" id="filtering-select" class="js_filPro">
            <option value=''>Tất cả</option>
            <?php
            foreach ($_SESSION['category'] as $dmPro) {
                $tenDm = $dmPro['danhmuc'];
                echo "<option value='$tenDm'>$tenDm</option>";
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
        <input type="search" id="search" placeholder="Tên Sản Phẩm" class="js_srPro" />
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
                if ($listProduct) {    
                    foreach ($listProduct as $product) {?>
                <tr>
                    <td><?= $product['ten']?></td>
                    <td><?= $product['soluong']?></td>
                    <td><?= $product['gia']?></td>
                    <td>
                        <a href="<?= _WEB_ROOT."/admin/detailProduct?id=".$product['id']?>"><span class="material-symbols-outlined">
info
</span></a>
<a href=""><span class="material-symbols-outlined">
delete
</span></a>
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
                if ($currentPage > 1) {
                    $backPage = $currentPage - 1;
                    echo "<li><a class='pagination_link' href='?page=$backPage'>&lt;</a></li>";
                }
              
                if ($currentPage <= 2 && $totalPages >= 5){
                    for ($i = 1; $i <=6; $i++){
                        $isCurrent=$currentPage == $i ?"active":"";
                        echo "<li><a class='pagination_link $isCurrent' href='?page=$i'>$i</a></li>";
                    }
                }
                else if ($totalPages <= 5){
                    for ($i = 1; $i <= $totalPages; $i++){
                        $isCurrent=$currentPage == $i ?"active":"";
                        echo "<li><a class='pagination_link $isCurrent' href='?page=$i'>$i</a></li>";
                    }
                    if ($totalPages <= 1){
                        echo "<style>.pagination_link:first-child { display: none; }</style>";
                    }
                }
                else if ($currentPage > 2 &&  $currentPage+5 <= $totalPages ) {
                        echo "<li><a class='pagination_link' href='?page=1'>1</a></li>";
                        echo "<li>...</li>";
                            for ($i = $currentPage; $i <= $currentPage+4; $i++){
                                $isCurrent=$currentPage == $i ?"active":"";
                                echo "<li><a class='pagination_link $isCurrent' href='?page=$i'>$i</a></li>";
                            } 
                        }  
                else if ($currentPage > 2 &&  $currentPage+5 >= $totalPages) {
                    echo "<li><a class='pagination_link' href='?page=1'>1</a></li>";
                    echo "<li>...</li>";
                    for($i = $totalPages-4 ; $i <= $totalPages ; $i++){
                        $isCurrent=$currentPage == $i ?"active":"";
                        echo "<li><a class='pagination_link $isCurrent' href='?page=$i'>$i</a></li>";    
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