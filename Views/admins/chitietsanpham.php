<div class="AddProduct-form">
    <div class="title-box">
        <div class="title-ADDPRODUCT">
            <header>Chi Tiết Sản Phẩm</header>
        </div>
        <div>
            <a href="http://127.0.0.1:5500/html/chinhsua.html">Chỉnh Sửa</a>
        </div>
    </div>
    <form class="mother-box-Add-Product" action="" method="post">
        <div id="hideField">
            <span>Bộ Sưu Tập</span>
            <span onclick="hideField()">Đóng</span>
            <ul>
                <li>mùa đông</li>
                <li>mùa hè</li>
                <li>mùa xuân</li>
                <li>mùa thu</li>
                <li>mùa đông</li>
                <li>mùa hè</li>
                <li>mùa xuân</li>
                <li>mùa thu</li>
            </ul>
        </div>
        <div class="General-Information-box">
            <header style="width: 100%; text-align: center">
                Thông tin chung
            </header>
            <div class="Product-Name-box">
                <label class="Product-Name" for="Product-Name">Tên sản phẩm *</label>
                <input spellcheck="false" class="input-text-ProductName" type="text" id="Product-Name"
                    placeholder="Nhập tên sản phẩm" disabled value="Quần kaki ống rộng" />
            </div>
            <div class="Product-Category-box">
                <label class="Product-Category" for="Product-Category">Danh mục sản phẩm *</label>
                <select class="Product-Category-select" name="Product-Category" id="Product-Category" disabled>
                    <option selected value="Danh-Mục">Quần</option>
                </select>
            </div>
            <div class="Product-Price-box">
                <div class="Product-Price-Nametag">
                    <label for="Product-Price">Giá Sảm Phẩm *</label>
                </div>
                <input spellcheck="false" class="Product-Price-input" type="number" name="Product-Price" min="0"
                    oninput="validity.valid||(value='');" id="Product-Price" placeholder="Nhập giá sản phẩm"
                    value="250.000" disabled />
            </div>
            <div class="Product-colection-box" onclick="showField()">
                <label for="" class="Product-colection-nametag">Bộ Sưu Tập</label>
                <label for="colection" id="name-checkbox">Có Bộ Sưu Tập</label>
                <input type="checkbox" name="" id="colection" checked disabled>
            </div>
            <div class="Product-Description-box">
                <label class="Product-Description" for="Product-Description">Mô tả sản phẩm</label>
                <textarea spellcheck="false" class="Product-Description-textarea" placeholder="Nhập mô tả sản phẩm"
                    name="" id="Product-Description" cols="30" rows="10"
                    disabled>Chất liệu kaki, form quần đẹp</textarea>
            </div>
        </div>
        <div class="Meta-Data-box">
            <header style="width: 100%; text-align: center">
                Chi tiết sản phẩm
            </header>

            <table>
                <thead>
                    <td>Màu</td>
                    <td>Kích Thước</td>
                    <td>Số lượng</td>
                </thead>
                <tbody>
                    <tr>
                        <td>Trắng</td>
                        <td>M</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>Trắng</td>
                        <td>L</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>Trắng</td>
                        <td>XL</td>
                        <td>10</td>
                    </tr>
                </tbody>
            </table>

        </div>
        <div class="AddProduct-img">
            <header style="width: 100%; text-align: center">
                Ảnh sản Phẩm
            </header>
            <div class="displayImg">
                <img src="../hinh anh/mattruocquan.jpg" alt="">
                <img src="../hinh anh/matsauquan.webp" alt="">
                <img src="../hinh anh/anhmau.webp" alt="">
                <img src="../hinh anh/anhmau1.webp" alt="">
            </div>
        </div>
</div>
</form>
</div>