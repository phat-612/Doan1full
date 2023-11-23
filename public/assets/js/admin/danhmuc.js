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
        addDetailProduct('danhmuc', inputValue);
    }
}

function editCategory(tempValue, id) {
    var newCategory = prompt("Chỉnh sửa danh mục", tempValue);
    if (newCategory !== null && newCategory !== "") {
        updateDetailProduct('danhmuc', newCategory, id);
    }
}

function deleteCategory(id) {
    deleteDetailProduct('danhmuc', id);
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
        addDetailProduct('mausac', inputValue);
    }
}

function editColor(tempValue, id) {
    var newColor = prompt("Chỉnh sửa màu sắc", tempValue);

    if (newColor !== null && newColor !== "") {
        updateDetailProduct('mausac', newColor, id);
    }
}

function deleteColor(id) {
    deleteDetailProduct('mausac', id);
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
        addDetailProduct('kichthuoc', inputValue);
    }
}

function editSize(tempValue, id) {
    var newSize = prompt("Chỉnh sửa kích thước", tempValue);

    if (newSize !== null && newSize !== "") {
        updateDetailProduct('kichthuoc', newSize, id);
    }
}

function deleteSize(id) {
    deleteDetailProduct('kichthuoc', id);
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
        addDetailProduct('bosuutap', inputValue);
    }
}

function editCollection(tempValue, id) {
    var newCollection = prompt("Chỉnh sửa bộ sưu tập", tempValue);

    if (newCollection !== null && newCollection !== "") {
        updateDetailProduct('bosuutap', newCollection, id);
    }
}


function deleteCollection(id) {
    deleteDetailProduct('bosuutap', id);
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function addDetailProduct(name, value) {
    let formData = new FormData();
    formData.append('name', name);
    formData.append('value', value);
    let requestOptions = {
        method: 'POST',
        body: formData
    }
    fetch(`${ROOTFOLDER}/api/addDetailValue`, requestOptions)
        .then(res => {
            window.location.reload();
        })
}
function updateDetailProduct(name, value, id) {
    let formData = new FormData();
    formData.append('name', name);
    formData.append('value', value);
    formData.append('id', id);
    let requestOptions = {
        method: 'POST',
        body: formData
    }
    fetch(`${ROOTFOLDER}/api/changeDetailValue`, requestOptions)
        .then(res => {
            window.location.reload();
        })
}
function deleteDetailProduct(name, id) {
    let formData = new FormData();
    formData.append('name', name);
    formData.append('id', id);
    let requestOptions = {
        method: 'POST',
        body: formData
    }
    fetch(`${ROOTFOLDER}/api/deleteDetailValue`, requestOptions)
        .then(res => {
            if (res.status == 200) {
                window.location.reload();
            } else {
                alert('Không thể xóa');
            }
        })
}