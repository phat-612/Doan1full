<?php
    $getOrder = count($orders1);
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 8; 
    $totalPages = ceil($getOrder / $limit);
    if ($currentPage < 1 && $currentPage > $totalPages) {
        header("Location: ?page=1");
        exit();
    }
    $status= isset($_GET['status']) ? $_GET['status'] : '';
    $sort = isset($_GET['sort']) ? $_GET['sort'] : '';
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    // tạo mảng mấy thuộc tính cần giữ lại
    $arrSearch = [
        'status'=>$status,
        'sort'=>$sort,
        'search'=>$search
    ];
    // xóa mấy thuộc tính rỗng
    $arrSearch = array_filter($arrSearch, function($value, $key) {
        return !empty($value);
    }, ARRAY_FILTER_USE_BOTH);
    // tạo string query url
    // category=áo&sort=ten
    $queryString = http_build_query($arrSearch);

?>
<div class="oder-form">
    <header>Đơn Hàng</header>
    <div class="filtering-box">
        <label>Trạng Thái : </label>
        <select id="filtering-select" class="js_status">
            <option value="">Tất cả</option>
            <option value="Chờ xử lý">Chờ Xử Lý</option>
            <option value="Đang Giao Hàng">Đang Giao Hàng</option>
            <option value="Bị Hủy">Bị Hủy</option>
            <option value="Hoàn Thành">Hoàn Thành</option>
        </select>
    </div>
    <div class="Sort-box">
        <label >Sắp Xếp : </label>
        <select class="js_sort">
            <option value="thoigian desc">Mới -> Cũ</option>
            <option value="thoigian">Cũ -> Mới</option>
        </select>
    </div>
    <div class="Search">
        <span class="icon"><i class="fa fa-search"></i></span>
        <input type="search" id="search" placeholder="Tên khách Hàng" class="js_srOrder" />
        <button class="js_btnSrOrder">tìm</button>
    </div>
    <div class="del-filter">
        <button class="btn-del-filter">Xóa Bộ Lọc</button>
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
                if ($orders){ 
                    foreach ($orders as $order) {?>
                <tr>
                    <td><?= $order['hoten']?></td>
                    <td><?= $order['thoigian']?></td>
                    <td><?= number_format($order['tongtien'], 0, '.', ' ')?></td>
                    <td><?= $order['trangthai']?></td>
                    <td>
                        <a href="<?= _WEB_ROOT."/admin/detailOrder?id=".$order['id']?>"><span class="material-symbols-outlined">info</span></a>
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
                echo "<li><a class='pagination_link' href='?$queryString&page=$backPage'>&lt;</a></li>";
            }
        
            if ($currentPage <= 2 && $totalPages >= 5){
                for ($i = 1; $i <=6; $i++){
                    $isCurrent=$currentPage == $i ?"active":"";
                    echo "<li><a class='pagination_link $isCurrent' href='?$queryString&page=$i'>$i</a></li>";
                }
            }
            else if ($totalPages <= 5){
                for ($i = 1; $i <= $totalPages; $i++){
                    $isCurrent=$currentPage == $i ?"active":"";
                    echo "<li><a class='pagination_link $isCurrent' href='?$queryString&page=$i'>$i</a></li>";
                }
                if ($totalPages <= 1){
                    echo "<style>.pagination_link:first-child { display: none; }</style>";
                }
            }
            else if ($currentPage > 2 &&  $currentPage+5 <= $totalPages ) {
                    echo "<li><a class='pagination_link' href='?$queryString&page=1'>1</a></li>";
                    echo "<li>...</li>";
                        for ($i = $currentPage; $i <= $currentPage+4; $i++){
                            $isCurrent=$currentPage == $i ?"active":"";
                            echo "<li><a class='pagination_link $isCurrent' href='?$queryString&page=$i'>$i</a></li>";
                        } 
                    }  
            else if ($currentPage > 2 &&  $currentPage+5 >= $totalPages) {
                echo "<li><a class='pagination_link' href='?$queryString&page=1'>1</a></li>";
                echo "<li>...</li>";
                for($i = $totalPages-4 ; $i <= $totalPages ; $i++){
                    $isCurrent=$currentPage == $i ?"active":"";
                    echo "<li><a class='pagination_link $isCurrent' href='?$queryString&page=$i'>$i</a></li>";    
                }
            }
            if ($currentPage < $totalPages) {   
                $nextPage = $currentPage +1;
                echo "<li><a class='pagination_link' href='?$queryString&page=$nextPage'>&gt;</a></li>";
            }
         ?>
        </ul>
    </div>
</div>