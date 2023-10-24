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

// Mảng lưu dữ liệu sản phẩm
var productData = [
    { color: "Trắng", size: "M", quantity: "10" },
    { color: "Trắng", size: "L", quantity: "10" },
    { color: "Trắng", size: "XL", quantity: "10" },
];

// Hiển thị dữ liệu sản phẩm trên bảng
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

    // Lặp qua mảng productData để hiển thị dữ liệu sản phẩm
    for (var i = 0; i < productData.length; i++) {
        html += "<tr>";
        html += "<td>" + productData[i].color + "</td>";
        html += "<td>" + productData[i].size + "</td>";

        // Số lượng hiển thị dưới dạng input field có thể chỉnh sửa
        html +=
            "<td><input type='number' value='" +
            productData[i].quantity +
            "' id='quantity-" +
            productData[i].id +
            "'></td>";
        html += "<td>";

        // Nút "Xóa" để xóa sản phẩm
        html +=
            "<button type='button' class='btn btn-danger' onclick='removeItem(" +
            productData[i].id +
            ")'>Xóa</button>";
        html += "</td>";
        html += "</tr>";
    }

    html += "</table>";
    document.getElementById("table").innerHTML = html;
}

// Thêm sản phẩm mới, và không để dữ liệu bị bỏ trống
function addOnClick() {
    var color = document.getElementById("color").value;
    var size = document.getElementById("size").value;
    var quantity = document.getElementById("quantity").value;

    if (color && size && quantity) {
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
        alert("Màu, Size, và Số lượng không thể trống.");
    }
}

// Xóa sản phẩm
function removeItem(id) {
    for (var i = 0; i < productData.length; i++) {
        if (productData[i].id === id) {
            productData.splice(i, 1);
            break;
        }
    }
    displayProductData();
}

// Cập nhật số lượng sản phẩm
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

// Hiển thị dữ liệu sản phẩm khi trang được tải
displayProductData();

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function ImagesFileAsURL() {
    var fileInput = document.getElementById("upload");
    var imagesContainer = document.getElementById("displayImg");
    var files = fileInput.files;

    // Xóa tất cả các hình ảnh hiện có
    while (imagesContainer.firstChild) {
        imagesContainer.removeChild(imagesContainer.firstChild);
    }

    if (files.length > 0) {
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var fileReader = new FileReader();

            fileReader.onload = function (e) {
                var imageContainer = document.createElement("div");
                var newImage = document.createElement("img");
                newImage.src = e.target.result;

                var deleteButton = document.createElement("button");
                deleteButton.innerHTML = "Xóa";
                deleteButton.addEventListener("click", function () {
                    // Xóa hình ảnh và nút xóa khi nút xóa được nhấn
                    imageContainer.remove();
                });

                imageContainer.appendChild(newImage);
                imageContainer.appendChild(deleteButton);
                imagesContainer.appendChild(imageContainer);
            };

            fileReader.readAsDataURL(file);
        }
    }
}

function deleteImage(deleteButton) {
    var imageContainer = deleteButton.parentElement;
    imageContainer.remove();
}
