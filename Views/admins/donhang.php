<div class="oder-form">
        <header>Đơn Hàng</header>
        <div class="filtering-box">
          <label>Lọc Sản Phẩm : </label>
          <select name="filtering-select">
            <option value="">-------</option>
            <option value="Waiting">Chờ Xử Lý</option>
            <option value="Processing">Đang Xử Lý</option>
            <option value="Success">Thành Công</option>
            <option value="Fall">Thất Bại</option>
          </select>
        </div>
        <div class="Sort-box">
          <label>Sắp Xếp : </label>
          <select name="Sort-select">
            <option value="">-------</option>
            <option value="old-new">Cũ -> Mới</option>
            <option value="new-old">Mới -> Cũ</option>
          </select>
        </div>
        <div class="Search">
          <span class="icon"><i class="fa fa-search"></i></span>
          <input type="search" id="search" placeholder="Search..." />
          <button>tìm</button>
        </div>
        <div class="mother-box">
          <table class="table">
            <thead>
              <th>Tên Khách Hàng</th>
              <th>Thời gian đặt hàng</th>
              <th>Tổng</th>
              <th>Trạng thái Đơn Hàng</th>
            </thead>
            <tbody>
              <tr>
                <td>Nguyen Van A</td>
                <td><p>16/09/2003</p></td>
                <td>789.000</td>
                <td>
                  <select name="" id="">
                    <option value="">Chờ xử lý</option>
                    <option value="">Đang cử lý</option>
                    <option value="">Thành công</option>
                    <option value="">Thất bại</option>
                  </select>
                </td>
                <td>
                  <a href="http://127.0.0.1:5500/html/chitietdonhang.html"
                    >Chi Tiết</a
                  >
                </td>
              </tr>
              <tr>
                <td>Nguyen van B</td>
                <td><p>16/09/2003</p></td>
                <td>300.000</td>
                <td>
                  <select name="" id="">
                    <option value="">Chờ xử lý</option>
                    <option value="">Đang cử lý</option>
                    <option value="">Thành công</option>
                    <option value="">Thất bại</option>
                  </select>
                </td>
                <td>
                  <a href="http://127.0.0.1:5500/html/chitietdonhang.html"
                    >Chi Tiết</a
                  >
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>