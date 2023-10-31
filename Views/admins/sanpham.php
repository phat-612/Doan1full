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
            <option value="A->Z">A->Z</option>
            <option value="Z->A">Z->A</option>
            <option value="Giá-Thấp-đến-Cao">Giá Thấp đến Cao</option>
            <option value="Giá-Cao-đến-Thấp">Giá Cao đến Thấp</option>
        </select>
    </div>
    <div class="Search">
        <span class="icon"><i class="fa fa-search"></i></span>
        <input type="search" id="search" placeholder="Search..." />
        <button class="js_srPro">tìm</button>
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
                <tr>
                    <td>Quần</td>
                    <td>1</td>
                    <td>70.000</td>
                    <td>
                        <a href="http://127.0.0.1:5500/html/chitiet.html">Chi Tiết</a>
                    </td>
                </tr>
                <tr>
                    <td>Quần</td>
                    <td>2</td>
                    <td>70.000</td>
                    <td>
                        <a href="http://127.0.0.1:5500/html/chitiet.html">Chi Tiết</a>
                    </td>
                </tr>
                <tr>
                    <td>Quần</td>
                    <td>3</td>
                    <td>70.000</td>
                    <td>
                        <a href="http://127.0.0.1:5500/html/chitiet.html">Chi Tiết</a>
                    </td>
                </tr>
                <tr>
                    <td>Quần</td>
                    <td>4</td>
                    <td>70.000</td>
                    <td>
                        <a href="http://127.0.0.1:5500/html/chitiet.html">Chi Tiết</a>
                    </td>
                </tr>
                <tr>
                    <td>Quần</td>
                    <td>5</td>
                    <td>70.000</td>
                    <td>
                        <a href="http://127.0.0.1:5500/html/chitiet.html">Chi Tiết</a>
                    </td>
                </tr>
                <tr>
                    <td>Quần</td>
                    <td>6</td>
                    <td>70.000</td>
                    <td>
                        <a href="http://127.0.0.1:5500/html/chitiet.html">Chi Tiết</a>
                    </td>
                </tr>
        </table>
    </div>


    <div id="pagination" class="pagination">
        <ul class="pagination-list">
            <li><a class="pagination_link" href="#" onclick="previousPage()">Trước</a></li>
            <li><a class="pagination_link" href="#">1</a></li>
            <li><a class="pagination_link" href="#">2</a></li>
            <li><a class="pagination_link" href="#">3</a></li>
            <li><a class="pagination_link" href="#">4</a></li>
            <li><a class="pagination_link" href="#" onclick="nextPage()">Sau</a></li>
        </ul>
    </div>
</div>