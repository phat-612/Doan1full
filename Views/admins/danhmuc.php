<form action="" class="catalogue-field">
        <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <div class="box danhmuc">
          <div>
            <h4>DANH MỤC</h4>
          </div>
          <button type="button" id="showFieldDM" onclick="showDanhMucField()">
            Thêm
          </button>
          <div class="tableDM-container scroll" id="tableDM">
            <table id="danhMucTable">
              <thead>
                <th>danh mục</th>
                <th>hành động</th>
              </thead>
              <tbody>
                <?php foreach ($_SESSION['category'] as $value) { ?>
                  <tr>
                    <td><?= $value['danhmuc'] ?></td>
                    <td>
                      <button type="button" onclick="editCategory('<?= $value['danhmuc'] ?>', <?= $value['id']?>)"><span class="material-symbols-outlined">edit</span></button>
                      <button type="button" onclick="deleteCategory(<?= $value['id']?>)"><span class="material-symbols-outlined">delete</span></button>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- ////////////////////////////////////////// -->
        <div class="box mausac">
          <div><h4>MÀU SẮC</h4></div>
          <button type="button" id="showFieldMS" onclick="showMauSacField()">
            Thêm
          </button>
          <div class="tableMS-container scroll" id="tableMS">
            <table id="mauSacTable">
              <thead>
                <tr>
                  <th>màu sắc</th>
                  <th>hành động</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($_SESSION['color'] as $value) { ?>
                  <tr>
                    <td><?= $value['mausac'] ?></td>
                    <td>
                      <button type="button" onclick="editColor('<?= $value['mausac'] ?>', <?= $value['id']?>)"><span class="material-symbols-outlined">edit</span></button>
                      <button type="button" onclick="deleteColor(<?= $value['id']?>)"><span class="material-symbols-outlined">delete</span></button>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- ////////////////////////////////////////// -->
        <div class="box kichthuoc">
          <div><h4>KÍCH THƯỚC</h4></div>
          <button type="button" id="showFieldKT" onclick="showKichThuocField()">
            Thêm
          </button>
          <div class="tableKT-container scroll" id="tableKT">
            <table id="kichThuocTable">
              <thead>
                <th>Kích thước</th>
                <th>hành động</th>
              </thead>
              <tbody>
              <?php foreach ($_SESSION['size'] as $value) { ?>
                <tr>
                  <td><?= $value['kichthuoc'] ?></td>
                  <td>
                    <button type="button" onclick="editCategory('<?= $value['kichthuoc'] ?>', <?= $value['id']?>)"><span class="material-symbols-outlined">edit</span></button>
                    <button type="button" onclick="deleteSize(<?= $value['id']?>)"><span class="material-symbols-outlined">delete</span></button>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- ////////////////////////////////////////// -->
        <div class="box bosuutap">
          <div><h4>BỘ SƯU TẬP</h4></div>
          <button type="button" id="showFieldBST" onclick="showBoSuuTapField()">
            Thêm
          </button>
          <div class="tableBST-container scroll" id="tableBST">
            <table id="boSuutapTable">
              <thead>
                <th>Bộ Sưu tập</th>
                <th>hành động</th>
              </thead>
              <tbody>
              <?php foreach ($_SESSION['collection'] as $value) { ?>
                <tr>
                  <td><?= $value['bosuutap'] ?></td>
                  <td>
                    <button type="button" onclick="editCollection('<?= $value['bosuutap'] ?>', <?= $value['id']?>)"><span class="material-symbols-outlined">edit</span></button>
                    <button type="button" onclick="deleteCollection(<?= $value['id']?>)"><span class="material-symbols-outlined">delete</span></button>
                  </td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- ////////////////DANH MUC///////////////// -->
        <div class="hidden-field" id="field-danhmuc">
          <span
            class="material-symbols-outlined closeField"
            id="closeFieldDM"
            onclick="closeDanhMucField()"
          >
            close
          </span>
          <h4>Thêm Danh Mục</h4>
          <input type="text" name="" id="dm" placeholder="Nhập Danh Mục" />
          <button type="button" onclick="addToDMTable()">Nhập</button>
        </div>
        <!-- ////////////////MAU SAC///////////////// -->
        <div class="hidden-field" id="field-mausac">
          <span
            class="material-symbols-outlined closeField"
            id="closeFieldMS"
            onclick="closeMauSacField()"
          >
            close
          </span>
          <h4>Thêm Màu Sắc</h4>
          <input type="text" name="" id="ms" placeholder="Nhập Màu Sắc" />
          <button type="button" onclick="addToMSTable()">Nhập</button>
        </div>
        <!-- ////////////////KICH THUOC///////////////// -->
        <div class="hidden-field" id="field-kichthuoc">
          <span
            class="material-symbols-outlined closeField"
            id="closeFieldKT"
            onclick="closeKichThuocField()"
          >
            close
          </span>
          <h4>Thêm Kích Thước</h4>
          <input type="text" name="" id="kt" placeholder="Nhập Kích Thước" />
          <button type="button" onclick="addToKTTable()">Nhập</button>
        </div>
        <!-- ////////////////BO SUU TAP///////////////// -->
        <div class="hidden-field" id="field-bosuutap">
          <span
            class="material-symbols-outlined closeField"
            id="closeFieldBST"
            onclick="closeBoSuuTapField()"
          >
            close
          </span>
          <h4>Thêm Bộ Sưu Tập</h4>
          <input type="text" name="" id="bst" placeholder="Nhập Bộ Sưu Tập" />
          <button type="button" onclick="addToBSTTable()">Nhập</button>
        </div>
      </form>