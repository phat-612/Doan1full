<?php
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 8; 
    $totalPages = ceil($getOrder / $limit);
    if ($currentPage < 1 || $currentPage > $totalPages) {
        header("Location: ?page=1");
        exit();
    }
?>
<div class="oder-form">
<header>Đơn Hàng</header>
        <div class="filtering-box">
          <label>Trạng Thái : </label>
          <select id="filtering-select" class="js_status">
            <option value="">Tất cả</option>
            <option value="Chờ xử lý">Chờ Xử Lý</option>
            <option value="Đang Xử Lý">Đang Xử Lý</option>
            <option value="Thành Công">Thành Công</option>
            <option value="Thất Bại">Thất Bại</option>
          </select>
        </div>
        <div class="Sort-box">
          <label>Sắp Xếp : </label>
          <select class="js_sort">
            <option value="thoigian desc">Mới -> Cũ</option>
            <option value="thoigian">Cũ -> Mới</option>
          </select>
        </div>
          <div class="Search">
              <span class="icon"><i class="fa fa-search"></i></span>
              <input type="search" id="search" placeholder="Search..." class="js_srOrder" />
              <button class="js_btnSrOrder">tìm</button>
          </div>
        <div class="mother-box">
          <table class="table-box">
            <thead>
              <th>Tên hách hàng</th>
              <th>Thời gian</th>
              <th>Tổng</th>
              <th>Trạng thái</th>
            </thead>
            <tbody>
            <?php
                if (empty($orders)) {
                   echo "Không có sản phẩm";
                } else {    
                    foreach ($orders as $order) {?>
                <tr>
                    <td><?= $order['hoten']?></td>
                    <td><?= $order['thoigian']?></td>
                    <td><?= $order['tongtien']?></td>
                    <td><?= $order['trangthai']?></td>
                    <td>
                        <a href="<?= _WEB_ROOT."/admin/detailOrder?id=".$order['id']?>">Chi Tiết</a>
                    </td>
                </tr>
                <?php
                    }
                }
                ?>
            </tbody>
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