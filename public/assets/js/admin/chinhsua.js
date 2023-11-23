let uploadImgs = [];

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

const chooseBST = document.getElementById("chooseBST")
const closeBST = document.querySelector("#closeBST");
const listCollectionCb = document.querySelectorAll("input[name='bosuutap[]']");
chooseBST.onclick = function (e) {
    e.preventDefault();
    document.querySelector(".colect_hide-box-form").style.display = "block";
};
closeBST.addEventListener("click", function () {
    document.querySelector(".colect_hide-box-form").style.display = "none";
});
listCollectionCb.forEach(cb => {
    cb.addEventListener("click", (e) => {
        checkCollection();
    })
})
function checkCollection() {
    chooseBST.checked = false;
    listCollectionCb.forEach(cb => {
        if (cb.checked) {
            chooseBST.checked = true;
        }

    });
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



var productData = [];
let formData = new FormData();
formData.append('id', document.querySelector('#id').value);
let requestOptions = {
    method: 'POST',
    body: formData,
    redirect: 'follow'
};
fetch(`${ROOTFOLDER}api/getDetailProduct`, requestOptions)
    .then(res => res.json())
    .then(data => {
        // console.log(data['chitietsanpham']);
        let id = 0;
        productData = data['chitietsanpham'].map((value) => {
            id++;
            return {
                idchitiet: value['id'],
                colorText: value['mausac'],
                sizeText: value['kichthuoc'],
                quantity: value['soluong'],
                id
            }
        });
        // console.log(productData);
        displayProductData();
    })


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
        html += "<td>" + productData[i].colorText + "</td>";
        html += "<td>" + productData[i].sizeText + "</td>";
        html +=
            "<td><input type='number' value='" +
            productData[i].quantity +
            "' id='quantity-" +
            productData[i].id +
            "' onblur='changeValue(" + productData[i].id + ", event)' ></td>";
        if (!productData[i].hasOwnProperty('idchitiet')) {
            html +=
                "<td><button type='button' class='btn btn-danger' onclick='removeItem(" +
                productData[i].id +
                ")'>Xóa</button></td>";
        }

        html += "</tr>";
    }

    html += "</table>";
    document.querySelector("#table").innerHTML = html;
}
function changeValue(id, event) {
    productData[id - 1]['quantity'] = event.target.value;
}
function addOnClick() {

    let selColor = document.getElementById("color");
    let selSize = document.getElementById("size");
    let quantity = document.getElementById("quantity").value;

    if (color.value && size.value && quantity) {
        let id = productData.length + 1;
        productData.push({
            colorText: selColor.options[selColor.selectedIndex].innerText,
            sizeText: selSize.options[selSize.selectedIndex].innerText,
            color: selColor.value,
            size: selSize.value,
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

// displayProductData();

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

const uploadInput = document.getElementById("upload");
const displayImgNew = document.querySelector("#displayImg .new_img_area");

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
// hàm xóa ảnh có sẳn
function deleteOldImg(event) {
    let parent = event.target.parentNode;
    parent.parentNode.removeChild(parent);
}
// Hàm hiển thị và xóa hình ảnh
function loadImgUpload() {
    displayImgNew.innerHTML = "";
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
        displayImgNew.innerHTML += html;
    }
}


// sự kiện gửi form
document.querySelector('form').addEventListener('submit', (e) => {
    e.preventDefault();
    let formData = new FormData(document.querySelector('form'));
    productData.forEach((ct, ind) => {
        if (ct.hasOwnProperty('idchitiet')) {
            formData.append(`chitietsanpham[${ind}][id]`, ct.idchitiet);
            formData.append(`chitietsanpham[${ind}][soluong]`, ct.quantity);
        } else {
            formData.append(`chitietsanpham[${ind}][idmausac]`, ct.color);
            formData.append(`chitietsanpham[${ind}][idkichthuoc]`, ct.size);
            formData.append(`chitietsanpham[${ind}][soluong]`, ct.quantity);
        }
    })
    let requestOptions = {
        method: 'POST',
        body: formData,
        redirect: 'follow'
    }
    fetch(`${ROOTFOLDER}api/editProduct`, requestOptions)
        .then(res => {
            window.location.href = `${ROOTFOLDER}admin/detailProduct?id=${document.querySelector('#id').value}`;
        })
    // .then(res => res.text())
    // .then(data => {
    //     console.log(data);
    // })
})