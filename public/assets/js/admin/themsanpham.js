let uploadImgs = [];

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

const chooseBST = document.querySelector("checkbox");
const closeBST = document.querySelector("#closeBST");
document.getElementById("chooseBST").onclick = function (e) {
    if (this.checked) {
        document.querySelector(".colect_hide-box-form").style.display = "block";
    } else {
        alert("Bạn vừa bỏ Bộ Sưu Tập");
    }
};
closeBST.addEventListener("click", function () {
    document.querySelector(".colect_hide-box-form").style.display = "none";
});

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

var productData = [];

function displayProductData() {
    var html = "<table class='table'>";
    html += "<thead>";
    html += "<tr>";
    html += "<th>Màu</th>";
    html += "<th>Size</th>";
    html += "<th>Số Lượng</th>";
    html += "<th>Action</th>";
    html += "</tr>";
    html += "</thead>";

    for (var i = 0; i < productData.length; i++) {
        html += "<tr>";
        html += "<td>" + productData[i].color + "</td>";
        html += "<td>" + productData[i].size + "</td>";
        html +=
            "<td><input type='number' value='" +
            productData[i].quantity +
            "' id='quantity-" +
            productData[i].id +
            "'></td>";
        html +=
            "<td><button type='button' class='btn btn-danger' onclick='removeItem(" +
            productData[i].id +
            ")'>Xóa</button></td>";
        html += "</tr>";
    }

    html += "</table>";
    document.getElementById("table").innerHTML = html;
}

function addOnClick() {
    var color = document.getElementById("color").value;
    var size = document.getElementById("size").value;
    var quantity = document.getElementById("quantity").value;

    if (color !== "Chọn-màu" && size !== "Chọn-size" && quantity !== "") {
        let id = productData.length + 1;
        productData.push({
            color: color,
            size: size,
            quantity: quantity,
            id: id,
        });
        displayProductData();
        clearItems();
    } else {
        alert("Vui lòng chọn màu, size và nhập số lượng.");
    }
}

function removeItem(id) {
    for (var i = 0; i < productData.length; i++) {
        if (productData[i].id === id) {
            productData.splice(i, 1);
            break;
        }
    }
    displayProductData();
}

function updateQuantity(id) {
    var updatedQuantity = document.getElementById("quantity-" + id).value;

    for (var i = 0; i < productData.length; i++) {
        if (productData[i].id === id) {
            productData[i].quantity = updatedQuantity;
            break;
        }
    }
    displayProductData();
}

function clearItems() {
    document.getElementById("color").value = "Chọn-màu";
    document.getElementById("size").value = "Chọn-size";
    document.getElementById("quantity").value = "";
}

displayProductData();

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

const uploadInput = document.getElementById("upload");
const displayImg = document.getElementById("displayImg");

uploadInput.addEventListener("change", (e) => {
    let uploades = e.target.files;
    for (let i = 0; i < uploades.length; i++) {
        if (uploades[i].type.includes("image")) {
            uploadImgs.push(uploades[i]);
        }
    }
    loadImgUpload();
});

// function
function deleteImage(index) {
    uploadImgs.splice(index, 1);
    loadImgUpload();
}

// Hàm hiển thị và xóa hình ảnh
function loadImgUpload() {
    displayImg.innerHTML = "";
    let fileList = new DataTransfer();
    for (let j = 0; j < uploadImgs.length; j++) {
        fileList.items.add(uploadImgs[j]);
    }
    fileList = fileList.files;
    uploadInput.files = fileList;
    for (let i = 0; i < fileList.length; i++) {
        let file = fileList[i];
        let html = `
      <img src="${URL.createObjectURL(file)}" alt="">
      <button onclick="deleteImage(${i})">Xóa</button>
    `;
        displayImg.innerHTML += html;
    }
}