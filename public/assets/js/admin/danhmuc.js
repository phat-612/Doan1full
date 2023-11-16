///////////////////////////////////*DANH MUC*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function showDanhMucField() {
    document.getElementById("field-danhmuc").style.display = "flex";
}

function closeDanhMucField() {
    document.getElementById("field-danhmuc").style.display = "none";
}
function addToDMTable() {
    var input = document.getElementById("dm");
    var inputValue = input.value;

    if (inputValue !== "") {
        var table = document
            .getElementById("danhMucTable")
            .getElementsByTagName("tbody")[0];
        var newRow = table.insertRow(table.rows.length);
        var cell1 = newRow.insertCell(0);
        cell1.innerHTML = inputValue;
        var cell2 = newRow.insertCell(1);
        cell2.innerHTML =
            `<button type="button" onclick="editRow(this)"><span class='material-symbols-outlined'>edit</span></button> <button type="button" onclick="deleteRow(this)"><span class="material-symbols-outlined">
            delete
            </span></button>`;

        input.value = ""; // xóa input sau khi thêm danh mục
        closeDanhMucField()
    }
}

function editRow(btn) {
    var row = btn.parentNode.parentNode;
    var category = row.cells[0].innerText; // Lấy văn bản danh mục để chỉnh sửa
    var newCategory = prompt("Chỉnh sửa danh mục", category);

    if (newCategory !== null && newCategory !== "") {
        row.cells[0].innerText = newCategory;
    }
}

function deleteRow(btn) {
    var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row); // Xóa hàng khỏi bảng
}
/////////////////////////////*MAU SAC*///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function showMauSacField() {
    document.getElementById("field-mausac").style.display = "flex";
}

function closeMauSacField() {
    document.getElementById("field-mausac").style.display = "none";
}

function addToMSTable() {
    var input = document.getElementById("ms");
    var inputValue = input.value;

    if (inputValue !== "") {
        var table = document
            .getElementById("mauSacTable")
            .getElementsByTagName("tbody")[0];
        var newRow = table.insertRow(table.rows.length);
        var cell1 = newRow.insertCell(0);
        cell1.innerHTML = inputValue;
        var cell2 = newRow.insertCell(1);
        cell2.innerHTML =
            '<button type="button" onclick="editRow(this)">sửa</button> <button type="button" onclick="deleteRow(this)">xóa</button>';
        input.value = "";
        closeMauSacField();
    }
}

function editRow(btn) {
    var row = btn.parentNode.parentNode;
    var color = row.cells[0].innerText;
    var newColor = prompt("Chỉnh sửa màu sắc", color);

    if (newColor !== null && newColor !== "") {
        row.cells[0].innerText = newColor;
    }
}

function deleteRow(btn) {
    var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
}
///////////////////////////////* KICH THUOC */////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function showKichThuocField() {
    document.getElementById("field-kichthuoc").style.display = "flex";
}

function closeKichThuocField() {
    document.getElementById("field-kichthuoc").style.display = "none";
}

function addToKTTable() {
    var input = document.getElementById("kt");
    var inputValue = input.value;

    if (inputValue !== "") {
        var table = document
            .getElementById("kichThuocTable")
            .getElementsByTagName("tbody")[0];
        var newRow = table.insertRow(table.rows.length);
        var cell1 = newRow.insertCell(0);
        cell1.innerHTML = inputValue;
        var cell2 = newRow.insertCell(1);
        cell2.innerHTML =
            '<button type="button" onclick="editRow(this)">sửa</button> <button type="button" onclick="deleteRow(this)">xóa</button>';
        input.value = "";
        closeKichThuocField();
    }
}

function editRow(btn) {
    var row = btn.parentNode.parentNode;
    var size = row.cells[0].innerText;
    var newSize = prompt("Chỉnh sửa kích thước", size);

    if (newSize !== null && newSize !== "") {
        row.cells[0].innerText = newSize;
    }
}

function deleteRow(btn) {
    var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
}
/////////////////////////////////////* BO SUU TAP *///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function showBoSuuTapField() {
    document.getElementById("field-bosuutap").style.display = "flex";
}

function closeBoSuuTapField() {
    document.getElementById("field-bosuutap").style.display = "none";
}

function addToBSTTable() {
    var input = document.getElementById("bst");
    var inputValue = input.value;

    if (inputValue !== "") {
        var table = document
            .getElementById("boSuutapTable")
            .getElementsByTagName("tbody")[0];
        var newRow = table.insertRow(table.rows.length);
        var cell1 = newRow.insertCell(0);
        cell1.innerHTML = inputValue;
        var cell2 = newRow.insertCell(1);
        cell2.innerHTML =
            '<button type="button" onclick="editRow(this)">sửa</button> <button type="button" onclick="deleteRow(this)">xóa</button>';
        input.value = "";
        closeBoSuuTapField();
    }
}

function editRow(btn) {
    var row = btn.parentNode.parentNode;
    var collection = row.cells[0].innerText;
    var newCollection = prompt("Chỉnh sửa bộ sưu tập", collection);

    if (newCollection !== null && newCollection !== "") {
        row.cells[0].innerText = newCollection;
    }
}

function deleteRow(btn) {
    var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
