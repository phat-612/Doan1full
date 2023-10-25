let seaParams = {};
let detailProduct;
const mainImg = document.querySelector('.main_img img');

const eleColor = document.querySelector('.choose.ccolor');
const eleSize = document.querySelector('.choose.csize');

const eleDescCtrl = document.querySelector('.js_desc_ctrl');
const eleDescContent = document.querySelector('.js_desc_content');
// lấy mảng 
let searchParams = new URLSearchParams(window.location.search);
searchParams.forEach(function (value, key) {
    seaParams[key] = value;
});

// kiểm tra id sản phẩm
if (!seaParams.hasOwnProperty('id')) {
    console.log('có id');
    window.location.href = '/doan1full/product';
}
// lấy dữ liệu sản phẩm
let formdata = new FormData();
formdata.append("id", seaParams['id']);

let requestOptions = {
    method: 'POST',
    body: formdata,
    redirect: 'follow'
};

fetch("/doan1full/api/getDetailProduct", requestOptions)
    .then(res => res.json())
    .then(result => {
        detailProduct = result;
        console.log(detailProduct);
        loadPage();
    });
// FUNCTION
function loadPage() {
    // nav
    document.querySelector('.tag_comeback li:last-child a').textContent = detailProduct['ten'];
    // load ảnh
    let imgs = detailProduct['hinhanh'];
    imgs.forEach(img => {
        document.querySelector('.left_img').innerHTML += `
            <div class="left_img_item">
                <img src="${"/doan1full/" + img}" alt="" class="detail">
            </div>
        `
    });
    mainImg.src = "/doan1full/" + imgs[0];
    // chọn xem ảnh sản phẩm
    let leftImgs = document.querySelectorAll('.left_img_item');
    leftImgs.forEach((img) => {
        img.addEventListener('click', (e) => {
            mainImg.src = e.target.src;
        })
    })
    // tên
    document.querySelector('.title_product').textContent = detailProduct['ten'];
    // giá
    document.querySelector('.js_price_pro').innerHTML = detailProduct['gia'] + ` vnđ`;
    // chi tiết
    let ctsp = detailProduct['chitietsanpham'];
    let listColor = new Set();
    let listSize = new Set();
    ctsp.forEach(e => {
        listColor.add(e.mausac);
        listSize.add(e.kichthuoc);
    });
    // chi tiết màu sắc
    listColor.forEach(color => {
        eleColor.innerHTML += `<span class="select color">${color}</span>`
    })
    // chi tiết kích thước
    listSize.forEach(size => {
        eleSize.innerHTML += `<span class="select size">${size}</span>`
    })
    // mô tả
    eleDescCtrl.addEventListener('click', (e) => {
        eleDescContent.classList.toggle('showElement');
    });
    eleDescContent.textContent = detailProduct['mota'];
}












// // render màu sắc kích thước
