<div class="AddProduct-form">
        <div class="title-ADDPRODUCT">
          <header>CHỈNH SỬA</header>
        </div>
        <div class="colect_hide-box-form">
          <form action="" class="colect_hide-box">
            <span id="closeBST">X Đóng</span>
            <h3>Chọn Bộ Sưu Tập:</h3>
            <div>
              <input
                type="checkbox"
                id="muaDong"
                class="collection-checkbox"
                checked
              />
              <label for="muaDong">Mùa Đông</label>
            </div>
            <div>
              <input type="checkbox" id="muaHe" class="collection-checkbox" />
              <label for="muaHe">Mùa Hè</label>
            </div>
            <div>
              <input
                type="checkbox"
                id="muaThu"
                class="collection-checkbox"
                checked
              />
              <label for="muaThu">Mùa Thu</label>
            </div>
          </form>
        </div>
        <form class="mother-box-Add-Product" action="" method="post">
          <div class="General-Information-box">
            <header>Thông tin chung</header>
            <div class="Product-Name-box">
              <label class="Product-Name" for="Product-Name"
                >Tên sản phẩm *</label
              >
              <input
                spellcheck="false"
                class="input-text-ProductName"
                type="text"
                id="Product-Name"
                placeholder="Nhập tên sản phẩm"
                value="Quần kaki ống rộng"
              />
            </div>
            <div class="Product-Category-box">
              <label class="Product-Category" for="Product-Category"
                >Danh mục sản phẩm *</label
              >
              <select
                class="Product-Category-select"
                name="Product-Category"
                id="Product-Category"
              >
                <option value="chọn-danh-mục">chọn danh mục</option>
                <option selected value="Danh-Mục-1">Quần</option>
                <option value="Danh-Mục-2">Áo</option>
                <option value="Danh-Mục-3">Phụ Kiện</option>
              </select>
            </div>
            <div class="Product-Price-box">
              <div class="Product-Price-Nametag">
                <label for="Product-Price">Giá Sảm Phẩm *</label>
              </div>
              <input
                spellcheck="false"
                class="Product-Price-input"
                type="number"
                name="Product-Price"
                min="0"
                oninput="validity.valid||(value='');"
                id="Product-Price"
                placeholder="Nhập giá sản phẩm"
                value="250000"
              />
            </div>
            <div class="colection-box">
              <div class="colect_name">Bộ Sưu Tập</div>
              <label for="chooseBST">Có bộ sưu tập</label>
              <input type="checkbox" id="chooseBST" checked />
            </div>
            <div class="Product-Description-box">
              <label class="Product-Description" for="Product-Description"
                >Mô tả sản phẩm</label
              >
              <textarea
                spellcheck="false"
                class="Product-Description-textarea"
                placeholder="Nhập mô tả sản phẩm"
                name=""
                id="Product-Description"
                cols="30"
                rows="10"
              >
Chất liệu kaki, form quần đẹp</textarea
              >
            </div>
          </div>
          <div class="Meta-Data-box">
            <div class="header-meta">
              <header style="width: 100%; text-align: center">
                Chi tiết sản phẩm
              </header>
            </div>
            <form action="" method="post" autocomplete="off">
              <div class="field">
                <div class="color-box">
                  <label class="color-nametag" for="color">Màu</label>
                  <div class="color">
                    <select class="color-select" name="" id="color">
                      <option value="">chọn màu</option>
                      <option value="Trắng">Trắng</option>
                      <option value="Đen">Đen</option>
                      <option value="Đỏ">Đỏ</option>
                      <option value="Vàng">Vàng</option>
                      <option value="Xanh dương">Xanh dương</option>
                      <option value="Xanh lá">Xanh lá</option>
                      <option value="Hồng">Hồng</option>
                      <option value="Cam">Cam</option>
                      <option value="Tím">Tím</option>
                    </select>
                  </div>
                </div>
                <div class="size-box">
                  <label class="size-nametag" for="size">Size</label>
                  <select class="size-select" name="" id="size">
                    <option value="">chọn size</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                  </select>
                </div>
                <div class="quantity-box">
                  <label class="quantity-nametag" for="quantity"
                    >số lượng</label
                  >
                  <input
                    class="quantity-input"
                    type="number"
                    id="quantity"
                    min="0"
                    oninput="validity.valid||(value='');"
                  />
                </div>
                <button
                  type="button"
                  id="btn-lappy"
                  class="btn btn-success"
                  onclick="addOnClick()"
                >
                  Thêm
                </button>
              </div>
              <div class="container" id="table"></div>
            </form>
          </div>
          <div class="AddProduct-img">
            <header style="width: 100%; text-align: center">
              Thêm ảnh sản Phẩm
            </header>
            <div class="drag-area">
              <input
                type="file"
                name="upload"
                id="upload"
                onchange="ImagesFileAsURL()"
                multiple
              />
              <div id="displayImg">
                <div>
                  <img src="../hinh anh/mattruocquan.jpg" alt="" />
                </div>
                <div>
                  <img src="../hinh anh/mattruocquan.jpg" alt="" />
                </div>
                <div>
                  <img src="../hinh anh/mattruocquan.jpg" alt="" />
                </div>
                <div>
                  <img src="../hinh anh/mattruocquan.jpg" alt="" />
                </div>
              </div>
            </div>
          </div>
          <div class="save-bt"><button type="button">Lưu</button></div>
        </form>
      </div>