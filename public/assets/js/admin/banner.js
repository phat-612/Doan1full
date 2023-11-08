let uploadImgs = [];
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
