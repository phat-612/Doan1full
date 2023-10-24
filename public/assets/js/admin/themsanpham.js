// const dropArea = document.querySelector(".drag-area");
// const dragText = dropArea.querySelector("header");
// const button = dropArea.querySelector("button");
// const input = dropArea.querySelector("input");

// button.addEventListener("click", () => {
//   input.click();
// });

// input.addEventListener("change", function () {
//   const file = this.files[0];
//   showFile(file);
// });

// dropArea.addEventListener("dragover", (event) => {
//   event.preventDefault();
//   dragText.textContent = "Thả để Tải Ảnh lên";
// });

// dropArea.addEventListener("dragleave", (event) => {
//   event.preventDefault();
//   dragText.textContent = "Kéo và Thả để Tải Ảnh lên";
// });

// dropArea.addEventListener("drop", (event) => {
//   event.preventDefault();
//   const file = event.dataTransfer.files[0];
//   showFile(file);
// });

// function showFile(file) {
//   const fileType = file.type;
//   const validExtensions = ["image/jpeg", "image/jpg", "image/png"];
//   if (validExtensions.includes(fileType)) {
//     const fileReader = new FileReader();
//     fileReader.onload = () => {
//       const fileUrl = fileReader.result;
//       const imgTag = `<img src="${fileUrl}">`;
//       dropArea.innerHTML = imgTag;
//     };
//     fileReader.readAsDataURL(file);
//   } else {
//     alert("Đây không phải là file ảnh");
//     dragText.textContent = "Kéo và Thả để Tải Ảnh lên";
//   }
// }

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

function ImagesFileAsURL() {
    // Lấy danh sách các tệp hình ảnh đã được chọn
    var fileSelected = document.getElementById("upload").files;

    // Kiểm tra nếu có ít nhất một tệp hình ảnh được chọn
    if (fileSelected.length > 0) {
        for (var i = 0; i < fileSelected.length; i++) {
            var fileToLoad = fileSelected[i];
            var fileReader = new FileReader();

            // Định nghĩa một hàm xử lý khi tệp hình ảnh được tải
            fileReader.onload = function (fileLoaderEvent) {
                var srcData = fileLoaderEvent.target.result;
                var newImage = document.createElement("img");

                // Đặt đường dẫn URL cho hình ảnh mới
                newImage.src = srcData;

                // Tạo nút xóa và gắn sự kiện xóa
                var deleteButton = document.createElement("button");
                deleteButton.innerHTML = "Xóa";
                deleteButton.addEventListener("click", function () {
                    // Xóa hình ảnh và nút xóa khi nút xóa được nhấn
                    newImage.remove();
                    deleteButton.remove();
                });

                // Hiển thị hình ảnh và nút xóa trên trang web
                var imageContainer = document.createElement("div");
                imageContainer.appendChild(newImage);
                imageContainer.appendChild(deleteButton);
                document.getElementById("displayImg").appendChild(imageContainer);
            };

            // Bắt đầu quá trình tải tệp hình ảnh dưới dạng URL
            fileReader.readAsDataURL(fileToLoad);
        }
    }
}
