<div class="Product-list-form">
        <header>Danh Sách Sản Phẩm</header>
        <div class="filtering-box">
          <label>Lọc Sản Phẩm : </label>
          <select name="filtering-select">
            <option value="">-------</option>
            <option value="T-shirt">Quần</option>
            <option value="Shirt">Áo</option>
            <option value="Polo">Phụ Kiện</option>
          </select>
        </div>
        <div class="Sort-box">
          <label>Sắp Xếp : </label>
          <select name="Sort-select">
            <option value="">-------</option>
            <option value="A->Z">A->Z</option>
            <option value="Z->A">Z->A</option>
            <option value="Giá-Thấp-đến-Cao">Giá Thấp đến Cao</option>
            <option value="Giá-Cao-đến-Thấp">Giá Cao đến Thấp</option>
          </select>
        </div>
        <div class="Search">
          <span class="icon"><i class="fa fa-search"></i></span>
          <input type="search" id="search" placeholder="Search..." />
          <button>tìm</button>
        </div>
        <div class="add-product">
          <a href="http://127.0.0.1:5500/html/themsanpham.html"
            >Thêm sản Phẩm</a
          >
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
            <tbody>
              <tr>
                <td>Quần</td>
                <td>1</td>
                <td>70.000</td>
                <td>
                  <a href="http://127.0.0.1:5500/html/chitiet.html">Chi Tiết</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="pagination-form" id="pagination"></div>
      </div>